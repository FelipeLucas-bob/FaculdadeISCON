<?php

return [

    // MENU ADMINISTRADOR
    [
        'type' => 'admin',
        'name' => 'Início',
        'cat' => 'home',
        'icon' => 'bi bi-house fs-5',
        'route' => 'panel.home',
        'default' => true,
        'subitems' => [],
    ],
    [
        'type' => 'admin',
        'name' => 'Usuários',
        'cat' => 'users',
        'icon' => 'bi bi-people fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Listar', 'route' => 'users.index'],
            ['name' => 'Configurações', 'route' => 'users.settings', 'admin' => true],
        ],
    ],
    [
        'type' => 'admin',
        'name' => 'Segurança',
        'cat'  => 'security',
        'icon' => 'bi bi-shield-lock fs-5',
        'route' => '',
        'subitems' => [
            ['name'  => 'Logs de Acesso', 'route' => 'security.logs', 'admin' => true],
            ['name'  => 'Atividades', 'route' => 'security.activities', 'admin' => true],
        ],
    ],
    [
        'type' => 'admin', // pode ser 'admin' se for restrito a administradores
        'name' => 'Notificações',
        'cat'  => 'notifications',
        'icon' => 'bi bi-bell fs-5',
        'route' => null, // sem rota principal, pois terá subitens
        'default' => true,
        'subitems' => [
            ['name' => 'Todas as Notificações', 'route' => 'notifications.index']
        ],

    ],


    // MENU DE SUPORTE
[
    'type' => 'suport',
    'name' => 'Atendimentos',
    'cat' => 'services',
    'icon' => 'bi bi-chat-dots fs-5',
    'route' => '',
    'subitems' => [
        ['name' => 'Listar', 'route' => 'services.index'],
        ['name' => 'Novo Atendimento', 'route' => 'service.create'],
    ],
],
[
    'type' => 'suport',
    'name' => 'Gestão de Atendimentos',
    'cat' => 'maneger_services',
    'icon' => 'bi bi-chat-dots fs-5',
    'route' => '',
    'subitems' => [
        ['name' => 'Chat', 'route' => 'service.chat'],
        ['name' => 'Demandas', 'route' => 'service.demand', 'admin' => true],
        ['name' => 'Tipos', 'route' => 'service.types', 'admin' => true],
        ['name' => 'Scripts', 'route' => 'service.scripts', 'admin' => true],
    ],
],
[
    'type' => 'technical_support',
    'name' => 'Suporte Técnico',
    'cat' => 'technical_support',
    'icon' => 'bi bi-headset fs-5',
    'route' => '',
    'subitems' => [
        ['name' => 'Listar', 'route' => 'services.index'],
        ['name' => 'Novo Chamado', 'route' => 'service.create'],
    ],
],

    // MENU ADMINISTRATIVO
    [
        'type' => 'administrative',
        'name' => 'Instituição',
        'cat' => 'institution',
        'icon' => 'bi bi-building fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Informações', 'route' => 'institution.index'],
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Cursos',
        'cat' => 'courses',
        'icon' => 'bi-mortarboard fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Listar', 'route' => 'courses.index'],
            ['name' => 'Registrar', 'route' => 'course.create'],
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Disciplinas',
        'cat' => 'disciplines',
        'icon' => 'bi-journal-richtext fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Listar', 'route' => 'disciplines.index'],
            ['name' => 'Registrar', 'route' => 'discipline.create'],
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Professores',
        'cat' => 'instructors',
        'icon' => 'bi-person-badge fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Listar', 'route' => 'instructors.index'],
            ['name' => 'Registrar', 'route' => 'instructor.create']
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Processo Seletivo',
        'cat' => 'registration',
        'icon' => 'bi-card-checklist fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Candidatos', 'route' => 'registrations.index'],
            // ['name' => 'Provas', 'route' => 'registrations.proof'],
            // ['name' => 'Registrar', 'route' => 'registrations.create', 'admin' => true],
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Alunos',
        'cat' => 'students',
        'icon' => 'bi-people fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Listar', 'route' => 'students.index'],
            ['name' => 'Matrícula', 'route' => 'student.create'],
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Turmas',
        'cat' => 'classes',
        'icon' => 'bi-diagram-3 fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Listar', 'route' => 'classes.index'],
            ['name' => 'Registrar', 'route' => 'classe.create'],
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Documentos',
        'cat'  => 'documents',
        'icon' => 'bi-folder2 fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Contrato', 'route' => 'documents.contract'],
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Financeiro',
        'cat' => 'financial',
        'icon' => 'bi-cash-stack fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Mensalidades', 'route' => 'financial.index'],
        ],
    ],

    [
        'type' => 'administrative',
        'name' => 'Biblioteca',
        'cat' => 'library',
        'icon' => 'bi-book fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Acervo', 'route' => 'library.books'],
            ['name' => 'Empréstimos', 'route' => 'library.loans'],
            ['name' => 'Registrar', 'route' => 'library.loan.create'],
        ],
    ],
    [
        'type' => 'administrative',
        'name' => 'Diplomação',
        'cat' => 'graduation',
        'icon' => 'bi-award fs-5',
        'route' => '',
        'subitems' => [
            ['name' => 'Solicitações', 'route' => 'graduation.requests'],
            ['name' => 'Diplomas Emitidos', 'route' => 'graduation.issued'],
        ],
    ],

    // // MENU ACADÊMICO
    // [
    //     'type' => 'academic',
    //     'name' => 'Turmas',
    //     'cat' => 'users',
    //     'icon' => 'bi-diagram-3 fs-5',
    //     'route' => '',
    //     'subitems' => [
    //         ['name' => 'Listar', 'route' => 'users.index'],
    //         ['name' => 'Configurações', 'route' => 'users.settings', 'admin' => true,],
    //     ],
    // ],


];
