<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use App\Models\CourseModel;
use App\Models\ProfileModel;
use App\Models\SectorModel;
use App\Models\User;
use App\Models\UserProfileModel;
use App\Models\UserRegistrationModel;
use App\Models\UserStatusModel;
use Illuminate\Database\Seeder;
use App\Models\QuestionModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Cadastrar Usuários Padrão.
        User::factory()->createMany([
            ['name' => 'Admin', 'email' => 'admin@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Diretor', 'email' => 'diretor@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Secretaria', 'email' => 'secretaria@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Professor', 'email' => 'professor@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Atendente', 'email' => 'atendente@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Aluno', 'email' => 'aluno@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Candidato', 'email' => 'candidato@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Assistente B.', 'email' => 'biblioteca@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Assistente A.', 'email' => 'academico@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],
            ['name' => 'Suporte Técnico', 'email' => 'suporte@iscon.edu.br', 'password' => bcrypt('Pass@2025'), 'active' => 1],

        ]);

        // Cadastrar Status dos Usuários.
        UserStatusModel::factory()->createMany([
            ['user_id' => 1, 'status' => false, 'deleted' => false], // Admin
            ['user_id' => 2, 'status' => false, 'deleted' => false], // Diretor
            ['user_id' => 3, 'status' => false, 'deleted' => false], // Secretaria
            ['user_id' => 4, 'status' => false, 'deleted' => false], // Professor
            ['user_id' => 5, 'status' => false, 'deleted' => false], // Atendente
            ['user_id' => 6, 'status' => false, 'deleted' => false], // Aluno
            ['user_id' => 7, 'status' => false, 'deleted' => false], // Candidato
            ['user_id' => 8, 'status' => false, 'deleted' => false], // Assistente de Biblioteca
            ['user_id' => 9, 'status' => false, 'deleted' => false], // Assistente Acadêmico
            ['user_id' => 10, 'status' => false, 'deleted' => false], // Suporte Técnico
        ]);

        // Cadastrar Setores Padrão.
        SectorModel::factory()->createMany([
            ['name' => 'Sistema', 'description' => 'Usuários para gestão do sistema (Admin).', 'user_id_creator' => 1],
            ['name' => 'Diretoria', 'description' => 'Setor responsável pela direção e gestão estratégica.', 'user_id_creator' => 1],
            ['name' => 'Secretaria', 'description' => 'Setor responsável pela secretaria acadêmica e documentos.', 'user_id_creator' => 1],
            ['name' => 'Professores', 'description' => 'Setor de registro de perfis de Professores.', 'user_id_creator' => 1],
            ['name' => 'Atendimento', 'description' => 'Setor de suporte e atendimento ao aluno.', 'user_id_creator' => 1],
            ['name' => 'Alunos', 'description' => 'Setor de registro de perfis de Aluno.', 'user_id_creator' => 1],
            ['name' => 'Externo', 'description' => 'Setor de registro de perfis Externos (Candidatos).', 'user_id_creator' => 1],
            ['name' => 'Biblioteca', 'description' => 'Setor responsável pela gestão da biblioteca.', 'user_id_creator' => 1],
            ['name' => 'Diplomação', 'description' => 'Setor responsável pela Diplomação.', 'user_id_creator' => 1],
            ['name' => 'Suporte Técnico', 'description' => 'Setor responsável pelo suporte técnico e TI.', 'user_id_creator' => 1],
        ]);

        // Cadastrar Perfis dos Setores Padrão.
        ProfileModel::factory()->createMany([
            ['name' => 'Administrador', 'description' => 'Perfil com acesso total ao sistema.', 'user_id_creator' => 1, 'sector_id' => 1],
            ['name' => 'Diretor', 'description' => 'Perfil de Diretor com acesso total à gestão da instituição.', 'user_id_creator' => 1, 'sector_id' => 2],
            ['name' => 'Secretária', 'description' => 'Perfil de Secretaria com acesso à gestão acadêmica e documentos.', 'user_id_creator' => 1, 'sector_id' => 3],
            ['name' => 'Professor', 'description' => 'Perfil de Professor com acesso personalizado.', 'user_id_creator' => 1, 'sector_id' => 4],
            ['name' => 'Atendente', 'description' => 'Perfil de Atendente com acesso ao suporte e atendimento ao aluno.', 'user_id_creator' => 1, 'sector_id' => 5],
            ['name' => 'Aluno', 'description' => 'Perfil de Aluno com acesso personalizado.', 'user_id_creator' => 1, 'sector_id' => 6],
            ['name' => 'Candidato', 'description' => 'Perfil de Candidato com acesso básico.', 'user_id_creator' => 1, 'sector_id' => 7],
            ['name' => 'Assistente de Biblioteca', 'description' => 'Perfil de Assistente de Biblioteca com acesso à gestão da biblioteca.', 'user_id_creator' => 1, 'sector_id' => 8],
            ['name' => 'Assistente Acadêmico', 'description' => 'Perfil de Assistente Acadêmico com acesso à diplomação.', 'user_id_creator' => 1, 'sector_id' => 9],
            ['name' => 'Suporte Técnico', 'description' => 'Perfil de Suporte Técnico com acesso à gestão de TI e suporte.', 'user_id_creator' => 1, 'sector_id' => 10],
        ]);

        // Vincular Usuários aos Perfis.
        UserProfileModel::factory()->createMany([
            ['user_id' => 1, 'profile_id' => 1], // Admin
            ['user_id' => 2, 'profile_id' => 2], // Diretor
            ['user_id' => 3, 'profile_id' => 3], // Secretaria
            ['user_id' => 4, 'profile_id' => 4], // Professor
            ['user_id' => 5, 'profile_id' => 5], // Atendente
            ['user_id' => 6, 'profile_id' => 6], // Aluno
            ['user_id' => 7, 'profile_id' => 7], // Candidato
            ['user_id' => 8, 'profile_id' => 8], // Assistente de Biblioteca
            ['user_id' => 9, 'profile_id' => 9], // Assistente Acadêmico
            ['user_id' => 10, 'profile_id' => 10], // Suporte Técnico
        ]);

        // Registrar Matrícula dos Usuários.
        UserRegistrationModel::factory()->createMany([
            ['user_id' => 1, 'registration' => 'ADMN0001'],
            ['user_id' => 2, 'registration' => 'DIRT0002'],
            ['user_id' => 3, 'registration' => 'SECR0003'],
            ['user_id' => 4, 'registration' => 'PROF0004'],
            ['user_id' => 5, 'registration' => 'ATND0005'],
            ['user_id' => 6, 'registration' => 'ALUN0006'],
            ['user_id' => 7, 'registration' => 'CAND0007'],
            ['user_id' => 8, 'registration' => 'BIBL0008'],
            ['user_id' => 9, 'registration' => 'ACAD0009'],
            ['user_id' => 10, 'registration' => 'SUPT0010'],
        ]);

        CategoryModel::factory()->createMany([
            ['id' => 1, 'name' => 'Acadêmico'],
            ['id' => 2, 'name' => 'Atendimento'],
            ['id' => 3, 'name' => 'Biblioteca'],
            ['id' => 4, 'name' => 'Coordenação'],
            ['id' => 5, 'name' => 'Declaração'],
            ['id' => 6, 'name' => 'Estágio'],
            ['id' => 7, 'name' => 'Financeiro'],
            ['id' => 8, 'name' => 'Matrícula'],
            ['id' => 9, 'name' => 'Ouvidoria'],
            ['id' => 10, 'name' => 'Secretaria'],
            ['id' => 11, 'name' => 'Suporte Técnico'],
        ]);

    }

}
