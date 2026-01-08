<?php

namespace Database\Seeders;

use App\Models\QuestionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $questions = [
            [
            'statement' => 'Uma estudante comprou um livro à vista para ganhar um desconto de 5% no valor original dele. Se o preço da etiqueta era R$ 60,00, quanto foi o valor do desconto?',
            'option_a' => '65 reais',
            'option_b' => '35 reais',
            'option_c' => '5 reais',
            'option_d' => '3 reais',
            'option_e' => '57 reais',
            'correct_answer' => 'd',
            ],
            [
            'statement' => 'Qual das unidades da federação a seguir não pertence à região Centro-Oeste do Brasil?',
            'option_a' => 'Distrito Federal',
            'option_b' => 'Goiás',
            'option_c' => 'Mato Grosso',
            'option_d' => 'Mato Grosso do Sul',
            'option_e' => 'Tocantins',
            'correct_answer' => 'e',
            ],
            [
            'statement' => 'O conceito de democracia é amplamente difundido na atualidade e se caracteriza por um sistema político em que os cidadãos elegem os seus dirigentes por meio de eleições periódicas. Qual dos países a seguir adota o regime político democrático?',
            'option_a' => 'República Popular da China',
            'option_b' => 'República Islâmica do Irã',
            'option_c' => 'República Socialista Federativa da Rússia',
            'option_d' => 'República Popular Democrática da Coreia (Coreia do Norte)',
            'option_e' => 'República da Coreia (Coreia do Sul)',
            'correct_answer' => 'e',
            ],
            [
            'statement' => 'Qual é o país que, durante os últimos anos, devido ao seu projeto bélico e seu armamento nuclear, tem aumentado a tensão com os Estados Unidos ao realizar testes e ao ameaçar vários países com possível ataque nuclear?',
            'option_a' => 'Israel',
            'option_b' => 'Brasil',
            'option_c' => 'Coreia do Sul',
            'option_d' => 'Coreia do Norte',
            'option_e' => 'Vietnã',
            'correct_answer' => 'd',
            ],
            [
            'statement' => 'Uma nova medição realizada em 2004 pelo Instituto Brasileiro de Geografia e Estatística IBGE foi responsável pela mudança do ponto considerado o mais alto do país que de pouco mais de 3 mil metros de altitude passou a ter pouco mais de 2900 metros. Localizado na região Norte brasileira, recebe a denominação de:',
            'option_a' => 'Pico da Neblina',
            'option_b' => 'Monte Everest',
            'option_c' => 'Pico da Bandeira',
            'option_d' => 'Monte das Oliveiras',
            'option_e' => 'Pico das Agulhas Negras',
            'correct_answer' => 'a',
            ],
            [
            'statement' => 'O que significa BREXIT?',
            'option_a' => 'É uma marca de carro elétrico.',
            'option_b' => 'Um acordo firmado entre Brasil e China.',
            'option_c' => 'Um movimento revolucionário na Índia.',
            'option_d' => 'Nome dado à saída do Reino Unido da União Europeia.',
            'option_e' => 'Nome dado a um estado americano.',
            'correct_answer' => 'd',
            ],
            [
            'statement' => 'Segundo os especialistas, qual é a principal razão de se realizar uma Reforma Previdenciária no Brasil?',
            'option_a' => 'Para diminuir a burocracia na liberação de aposentadoria.',
            'option_b' => 'Para aumentar a expectativa de vida da população brasileira.',
            'option_c' => 'Para diminuir os prejuízos dos cofres públicos.',
            'option_d' => 'Para copiar o modelo francês de aposentadoria.',
            'option_e' => 'Para inserir os jovens no mercado de trabalho mais cedo.',
            'correct_answer' => 'c',
            ],
            [
            'statement' => 'Qual é a fórmula química da água?',
            'option_a' => 'H3SO4',
            'option_b' => 'NaCl',
            'option_c' => 'C12H22O11',
            'option_d' => 'H2O',
            'option_e' => 'C2H5OH',
            'correct_answer' => 'd',
            ],
            [
            'statement' => 'Quais dos países a seguir, não tem a língua portuguesa como língua oficial?',
            'option_a' => 'Brasil',
            'option_b' => 'Portugal',
            'option_c' => 'Angola',
            'option_d' => 'Moçambique',
            'option_e' => 'África do Sul',
            'correct_answer' => 'e',
            ],
            [
            'statement' => 'Qual das opções a seguir representa um exemplo de fonte de energia renovável?',
            'option_a' => 'Carvão mineral',
            'option_b' => 'Petróleo',
            'option_c' => 'Energia nuclear',
            'option_d' => 'Gás natural',
            'option_e' => 'Energia solar',
            'correct_answer' => 'e',
            ]
        ];

        QuestionModel::factory()->createMany($questions);
    }
}
