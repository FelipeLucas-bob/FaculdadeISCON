<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserInfoModel;
use App\Models\UserProfileModel;
use App\Models\UserStatusModel;
use League\Csv\Reader;
use League\Csv\Statement;

/**
 * @property \Symfony\Component\Console\Output\OutputInterface $output
 */
class ImportAlunos extends Command
{
    protected $signature = 'import:alunos {arquivo}';
    protected $description = 'Importa alunos a partir de um arquivo CSV (name e cpf obrigatórios)';

    public function handle()
    {
        $arquivo = $this->argument('arquivo');

        if (!file_exists($arquivo)) {
            $this->error("Arquivo não encontrado: $arquivo");
            return Command::FAILURE;
        }

        // 🧩 Converte o arquivo para UTF-8 (corrige CSVs do Excel)
        $conteudo = file_get_contents($arquivo);
        $conteudoUtf8 = mb_convert_encoding(
            $conteudo,
            'UTF-8',
            mb_detect_encoding($conteudo, 'UTF-8, ISO-8859-1, Windows-1252', true)
        );

        // Cria arquivo temporário
        $tempPath = storage_path('app/temp_import.csv');
        file_put_contents($tempPath, $conteudoUtf8);

        // Detecta delimitador (; ou ,)
        $primeiraLinha = fgets(fopen($tempPath, 'r'));
        $delimitador = str_contains($primeiraLinha, ';') ? ';' : ',';

        // 📖 Lê o CSV
        $csv = Reader::createFromPath($tempPath, 'r');
        $csv->setDelimiter($delimitador);
        $csv->setHeaderOffset(0); // Define a primeira linha como cabeçalho

        // Normaliza cabeçalhos
        $headersOriginais = $csv->getHeader();
        $headersNormalizados = array_map('strtolower', $headersOriginais);
        $csv->setHeaderOffset(0); // reafirma o cabeçalho original

        // Lê os registros
        $registros = Statement::create()->process($csv);
        $total = count($registros);
        $count = 0;

        $this->info("Iniciando importação de {$total} alunos...\n");
        $this->output->progressStart($total);

        foreach ($registros as $linha) {
            $linha = array_change_key_case($linha, CASE_LOWER);

            $nome = trim($linha['name'] ?? $linha['nome'] ?? '');
            $cpf  = preg_replace('/\D/', '', $linha['cpf'] ?? '');

            if (empty($nome) || empty($cpf)) {
                $this->warn("\nLinha ignorada (sem nome ou CPF): " . json_encode($linha));
                $this->output->progressAdvance();
                continue;
            }

            $nome = $this->cleanString($nome);
            $email = $this->gerarEmailInstitucional($nome);

            // Evita e-mails duplicados
            $baseEmail = $email;
            $i = 1;
            while (User::where('email', $email)->exists()) {
                $email = str_replace('@iscon.edu.br', "{$i}@iscon.edu.br", $baseEmail);
                $i++;
            }

            // 👤 Cria o usuário principal
            $user = User::create([
                'name'     => $nome,
                'email'    => $email,
                'password' => Hash::make('Password@2025'),
                'active'   => 1,
            ]);

            // 🔗 Status
            UserStatusModel::create([
                'user_id' => $user->id,
                'status'  => false,
                'delete'  => false,
            ]);

            // 🔗 Informações adicionais
            UserInfoModel::create([
                'author_id' => 1,
                'user_id'   => $user->id,
                'cpf'       => $cpf,
                'rg'        => null,
                'name'      => $nome,
                'email'     => $email,
                'date_of_birth' => null,
            ]);

            // 🔗 Perfil do usuário
            UserProfileModel::create([
                'user_id'   => $user->id,
                'profile_id' => 6,
            ]);


            $count++;
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
        $this->info("\n✅ Importação concluída! {$count} alunos criados com sucesso.");

        return Command::SUCCESS;
    }

    /**
     * 🧹 Remove caracteres inválidos e garante UTF-8 válido
     */
    private function cleanString($value)
    {
        $value = preg_replace('/[\x00-\x1F\x7F\xA0]/u', ' ', $value);
        $value = trim($value);
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }

    /**
     * ✉️ Gera o e-mail institucional a partir do nome
     * Ex: "Maria da Silva" -> "maria.da@iscon.edu.br"
     */
    private function gerarEmailInstitucional($nomeCompleto)
    {
        $nomeEmail = mb_strtolower($nomeCompleto, 'UTF-8');
        $nomeEmail = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $nomeEmail);
        $partes = preg_split('/\s+/', trim($nomeEmail));

        $primeiro = $partes[0] ?? '';
        $segundo  = $partes[1] ?? '';

        $email = $segundo
            ? "{$primeiro}.{$segundo}@iscon.edu.br"
            : "{$primeiro}@iscon.edu.br";

        return preg_replace('/[^a-z0-9\.@]/', '', $email);
    }
}
