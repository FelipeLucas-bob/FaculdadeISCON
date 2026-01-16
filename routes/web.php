<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/**
 * =======================
 *    REDIRECIONAMENTOS
 * =======================
 */
Route::get('/', function () {
    return redirect(getRouterValue() . 'entrar');
});

Route::get('/home', function () {
    return redirect(getRouterValue() . 'painel');
})->name('home');

Route::get('/login', function () {
    return redirect(getRouterValue() . 'entrar');
})->name('login');

Route::get('/logout/get', [App\Http\Controllers\Panel\UserController::class, 'logoutGet'])->name('logout.get');


/**
 * =======================login
 *    ROTAS PÚBLICAS
 * =======================
 */

Route::prefix('/')->group(function () {

    Route::get('/logout/get', [App\Http\Controllers\Panel\UserController::class, 'logoutGet'])->name('logout.get');

    /**
     * =======================
     *          SITE
     * =======================
     */

    Route::get('/', [App\Http\Controllers\Site\SiteController::class, 'index'])->name('site.index');
    Route::get('/sobre', [App\Http\Controllers\Site\SiteController::class, 'about'])->name('site.about');

    Route::get('/cursos', [App\Http\Controllers\Site\SiteController::class, 'courses'])->name('site.courses');
    Route::get('/curso', [App\Http\Controllers\Site\SiteController::class, 'courseDetails'])->name('site.course.details');

    //Route::get('/professores', [App\Http\Controllers\Site\SiteController::class, 'instructors'])->name('site.instructors');
    //Route::get('/professor', [App\Http\Controllers\Site\SiteController::class, 'instructorDetails'])->name('site.instructor.details');

    //Route::get('/noticias', [App\Http\Controllers\Site\SiteController::class, 'blog'])->name('site.blog');
    //Route::get('/noticia', [App\Http\Controllers\Site\SiteController::class, 'blogDetails'])->name('site.blog.details');

    //Route::get('/eventos', [App\Http\Controllers\Site\SiteController::class, 'events'])->name('site.events');
    //Route::get('/evento', [App\Http\Controllers\Site\SiteController::class, 'eventDetails'])->name('site.event.details');

    Route::get('/termos', [App\Http\Controllers\Site\SiteController::class, 'terms'])->name('site.terms');
    Route::get('/privacidade', [App\Http\Controllers\Site\SiteController::class, 'privacy'])->name('site.privacy');

    Route::get('/contatos', [App\Http\Controllers\Site\SiteController::class, 'contacts'])->name('site.contacts');
    Route::post('/mensagem', [App\Http\Controllers\Site\SiteController::class, 'contactsTalk'])->name('site.contactsTalk');

    Route::get('/inscricao', [App\Http\Controllers\Site\SiteController::class, 'enroll'])->name('site.enroll');
    Route::post('/inscricao', [App\Http\Controllers\Site\SiteController::class, 'enrollStore'])->name('enroll.store');
});


/**
 * =======================
 *     AUTENTICAÇÃO
 * =======================
 */

Route::get('/entrar', [App\Http\Controllers\Panel\HomeController::class, 'sign_in'])->name('panel.sign_in');




/**
 * =======================
 *     ROTAS PRIVADAS
 * =======================
 */


Route::middleware(['auth', 'check.access'])->group(function () {


    /**
     * =======================
     * PAINEL -> INÍCIO
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/', [App\Http\Controllers\Panel\HomeController::class, 'index'])->name('panel.home');
        // Route::get('/entrar', [App\Http\Controllers\Panel\HomeController::class, 'sign_in'])->name('panel.sign_in');
    });

    /**
     * =======================
     * PAINEL -> INSTITUIÇÃO
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/instituicao', [App\Http\Controllers\Panel\InstitutionController::class, 'index'])->name('institution.index');
    });

    /**
     * =======================
     * PAINEL -> USUÁRIOS
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/usuarios', [App\Http\Controllers\Panel\UserController::class, 'index'])->name('users.index');
        Route::post('/usuario', [App\Http\Controllers\Panel\UserController::class, 'store'])->name('user.store');
        Route::get('/usuarios/configuracoes', [App\Http\Controllers\Panel\UserController::class, 'settings'])->name('users.settings');
        Route::post('/usuarios/setor', [App\Http\Controllers\Panel\UserController::class, 'sector'])->name('sector.store');
        Route::post('/usuarios/perfil', [App\Http\Controllers\Panel\UserController::class, 'profile'])->name('profile.store');
        Route::post('/usuarios/atividade', [App\Http\Controllers\Panel\UserController::class, 'activity'])->name('activity.store');
        Route::post('/modulo/acesso', [App\Http\Controllers\Panel\ModuleController::class, 'store'])->name('module.access.store');
        Route::post('/usuario/inativar', [App\Http\Controllers\Panel\UserController::class, 'inactivate'])->name('user.inactivate');
        Route::post('/usuario/perfil/alterar', [App\Http\Controllers\Panel\UserController::class, 'userProfileUpdate'])->name('user.profile.update');
        Route::get('/usuario/perfil/consultar', [App\Http\Controllers\Panel\UserController::class, 'userProfileSelect'])->name('user.profile.select');
        Route::post('usuario/senha/resetar', [App\Http\Controllers\Panel\UserController::class, 'resetPassword'])->name('user.reset.password');

        $usuario = '/usuario/{id}';
        Route::get("$usuario", [App\Http\Controllers\Panel\UserController::class, 'show'])->name('user.show');
        Route::get("$usuario/visualizar", [App\Http\Controllers\Panel\UserController::class, 'view'])->name('user.view');
        Route::get("$usuario/editar", [App\Http\Controllers\Panel\UserController::class, 'edit'])->name('user.edit');
        Route::get("$usuario/editar/usuario", [App\Http\Controllers\Panel\UserController::class, 'edit'])->name('user.edit.usuario');
        Route::get("$usuario/editar/alterar-senha", [App\Http\Controllers\Panel\UserController::class, 'edit'])->name('user.edit.alterar-senha');
        Route::post("$usuario/editar/contatos", [App\Http\Controllers\Panel\UserController::class, 'editContacts'])->name('user.edit.contacts');
        Route::post("$usuario/editar/endereco", [App\Http\Controllers\Panel\UserController::class, 'editAddress'])->name('user.edit.address');
        Route::get("$usuario/editar/acessos", [App\Http\Controllers\Panel\UserController::class, 'edit'])->name('user.edit.acessos');
        Route::get("$usuario/editar/administrador", [App\Http\Controllers\Panel\UserController::class, 'edit'])->name('user.edit.administrador');
        Route::put("$usuario", [App\Http\Controllers\Panel\UserController::class, 'update'])->name('user.update');
        Route::put("$usuario/senha", [App\Http\Controllers\Panel\UserController::class, 'updatePassword'])->name('user.updateSenha');
        Route::delete("$usuario", [App\Http\Controllers\Panel\UserController::class, 'destroy'])->name('user.destroy');
    });

    /**
     * =======================
     * PAINEL -> SEGURANÇA
     * =======================
     */
    Route::prefix('painel')->group(function () {
        Route::get('/seguranca/logs', [App\Http\Controllers\Panel\AdminSecurityController::class, 'logs'])->name('security.logs');
        Route::get('/seguranca/atividades', [App\Http\Controllers\Panel\AdminSecurityController::class, 'activities'])->name('security.activities');
    });

    /**
     * =======================
     * PAINEL -> NOTIFICAÇÕES
     * =======================
     */
    Route::prefix('painel')->group(function () {
        Route::get('/notificacoes', [App\Http\Controllers\Panel\NotificationController::class, 'index'])->name('notifications.index');
        Route::get('/notificacoes/nao-lidas', [App\Http\Controllers\Panel\NotificationController::class, 'unread'])->name('notifications.unread');
        Route::get('/notificacoes/{id}/ler', [App\Http\Controllers\Panel\NotificationController::class, 'markAsRead'])->name('notifications.read');
    });


    /**
     * =======================
     * PAINEL -> PERFIL
     * =======================
     */
    Route::prefix('painel')->group(function () {
        $usuario = '/profile/{id}';
        Route::get("$usuario", [App\Http\Controllers\Panel\ProfileController::class, 'show'])->name('profile.show');
        Route::get("$usuario/editar", [App\Http\Controllers\Panel\ProfileController::class, 'edit'])->name('profile.edit');
        Route::get("$usuario/editar/alterar-senha", [App\Http\Controllers\Panel\ProfileController::class, 'edit'])->name('profile.edit.alterar-senha');
        Route::post('usuario/status/alterar', [App\Http\Controllers\Panel\ProfileController::class, 'updateStatus'])->name('user.status.update');
        Route::post('/usuario/upload-avatar', [App\Http\Controllers\Panel\ProfileController::class, 'uploadAvatar'])->name('user.uploadAvatar');
    });
    /**
     * =======================
     * PAINEL -> ATENDIMENTOS
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/atendimentos', [App\Http\Controllers\Panel\ServiceController::class, 'index'])->name('services.index');
        Route::get('/atendimento', [App\Http\Controllers\Panel\ServiceController::class, 'create'])->name('service.create');
        Route::post('/atendimento', [App\Http\Controllers\Panel\ServiceController::class, 'store'])->name('service.store');
        Route::get('/atendimento/demanda', [App\Http\Controllers\Panel\ServiceController::class, 'demand'])->name('service.demand');
        Route::post('/atendimento/demanda', [App\Http\Controllers\Panel\ServiceController::class, 'demandStore'])->name('service.demand.store');
        Route::get('/atendimento/chat', [App\Http\Controllers\Panel\ServiceController::class, 'chat'])->name('service.chat');
        Route::get('/atendimentos/tipos', [App\Http\Controllers\Panel\ServiceController::class, 'types'])->name('service.types');
        Route::post('/atendimento/tipos', [App\Http\Controllers\Panel\ServiceController::class, 'typeStore'])->name('service.type.store');
        Route::get('/atendimentos/scripts', [App\Http\Controllers\Panel\ServiceController::class, 'scripts'])->name('service.scripts');
        Route::post('/atendimento/script', [App\Http\Controllers\Panel\ServiceController::class, 'scriptStore'])->name('service.script.store');

        Route::get('/atendimentos/{categoria}', [App\Http\Controllers\Panel\ServiceController::class, 'serviceCategory'])->name('service.category');

        Route::get('/demands/by-sector/{sector}', [App\Http\Controllers\Panel\ServiceController::class, 'getBySector']);
    });

    /**
     * =======================
     * PAINEL -> PROCESSO SELETIVO
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/processo-seletivo', [App\Http\Controllers\Panel\RegistrationController::class, 'index'])->name('registrations.index');
        Route::post('/prova', [App\Http\Controllers\Panel\ProofController::class, 'proof'])->name('proof.proof');
        Route::post('/prova/iniciar', [App\Http\Controllers\Panel\ProofController::class, 'start'])->name('proof.start');
        Route::post('/prova/continuar', [App\Http\Controllers\Panel\ProofController::class, 'continue'])->name('proof.continue');
        Route::post('/resposta', [App\Http\Controllers\Panel\ProofController::class, 'answers'])->name('registrations.answers');
        Route::get('/prova/{registration}', [App\Http\Controllers\Panel\ProofController::class, 'show'])->name('proof.show');
        Route::get('/painel/processo-seletivo/{registration}/prova', [App\Http\Controllers\Panel\ProofController::class, 'show'])->name('registrations.proof');

        Route::get('/processo-seletivo/{registration}/prova', [App\Http\Controllers\Panel\ProofController::class, 'show'])->name('registrations.proof');
        Route::post('/prova/resposta', [App\Http\Controllers\Panel\ProofController::class, 'updateAnswer'])->name('registrations.answers');
        Route::post('/painel/prova/{proof}/finalizar', [App\Http\Controllers\Panel\ProofController::class,'finish'])->name('proof.finish');




    });

    /**
     * =======================
     * PAINEL -> ALUNOS
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/alunos', [App\Http\Controllers\Panel\StudentController::class, 'index'])->name('students.index');
        Route::get('/aluno', [App\Http\Controllers\Panel\StudentController::class, 'search'])->name('student.search');
        Route::get('/aluno/matricula', [App\Http\Controllers\Panel\StudentController::class, 'create'])->name('student.create');
        Route::post('/aluno/matricula', [App\Http\Controllers\Panel\StudentController::class, 'store'])->name('student.store');
    });

    /**
     * =======================
     * PAINEL -> PROFESSORES
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/professores', [App\Http\Controllers\Panel\InstructorController::class, 'index'])->name('instructors.index');
        Route::get('/professor/cadastro', [App\Http\Controllers\Panel\InstructorController::class, 'create'])->name('instructor.create');
        Route::post('/professor/cadastro', [App\Http\Controllers\Panel\InstructorController::class, 'store'])->name('instructor.store');
    });

    /**
     * =======================
     * PAINEL -> CURSOS
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/cursos', [App\Http\Controllers\Panel\CourseController::class, 'index'])->name('courses.index');
        Route::get('/curso/cadastro', [App\Http\Controllers\Panel\CourseController::class, 'create'])->name('course.create');
        Route::post('/curso/cadastro', [App\Http\Controllers\Panel\CourseController::class, 'store'])->name('course.store');
    });

    /**
     * =======================
     * PAINEL -> DISCIPLINAS
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/disciplinas', [App\Http\Controllers\Panel\DisciplineController::class, 'index'])->name('disciplines.index');
        Route::get('/disciplina/cadastro', [App\Http\Controllers\Panel\DisciplineController::class, 'create'])->name('discipline.create');
        Route::post('/disciplina/cadastro', [App\Http\Controllers\Panel\DisciplineController::class, 'store'])->name('discipline.store');
    });

    /**
     * =======================
     * PAINEL -> TURMAS
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/turmas', [App\Http\Controllers\Panel\ClasseController::class, 'index'])->name('classes.index');
        Route::get('/turma/cadastro', [App\Http\Controllers\Panel\ClasseController::class, 'create'])->name('classe.create');
        Route::post('/turma/cadastro', [App\Http\Controllers\Panel\ClasseController::class, 'store'])->name('classe.store');
    });

    /**
     * =======================
     * PAINEL -> DOCUMENTOS
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/contrato', [App\Http\Controllers\Panel\DocumentController::class, 'contract'])->name('documents.contract');
        Route::get('/contrato/usuario', [App\Http\Controllers\Panel\DocumentController::class, 'contractUSer'])->name('documents.contract.user');
    });

    /**
     * =======================
     * PAINEL -> FINANCEIRO
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/financeiro', [App\Http\Controllers\Panel\FinancialController::class, 'index'])->name('financial.index');
        Route::get('/financeiro/cadastro', [App\Http\Controllers\Panel\FinancialController::class, 'create'])->name('financial.create');
        Route::post('/financeiro/cadastro', [App\Http\Controllers\Panel\FinancialController::class, 'store'])->name('financial.store');
    });

    /**
     * =======================
     * PAINEL -> BIBLIOTECA
     * =======================
     */

    Route::prefix('painel')->group(function () {
        Route::get('/biblioteca/livros', [App\Http\Controllers\Panel\LibraryController::class, 'books'])->name('library.books');
        Route::get('/biblioteca/emprestimos', [App\Http\Controllers\Panel\LibraryController::class, 'loans'])->name('library.loans');
        Route::get('/biblioteca/emprestimo/registrar', [App\Http\Controllers\Panel\LibraryController::class, 'loanCreate'])->name('library.loan.create');
        Route::get('/biblioteca/emprestimo/{id}', [App\Http\Controllers\Panel\LibraryController::class, 'loan'])->name('library.loan');
        Route::post('/biblioteca/emprestimo/registrar', [App\Http\Controllers\Panel\LibraryController::class, 'loanStore'])->name('library.loan.store');
        Route::post('/biblioteca/emprestimo/devolver', [App\Http\Controllers\Panel\LibraryController::class, 'loanReturn'])->name('library.loan.return');
        Route::post('/biblioteca/editora', [App\Http\Controllers\Panel\LibraryController::class, 'publisherStore'])->name('library.publisher.store');
        Route::post('/biblioteca/livro', [App\Http\Controllers\Panel\LibraryController::class, 'bookStore'])->name('library.book.store');
        Route::get('/biblioteca/livro/{id}', [App\Http\Controllers\Panel\LibraryController::class, 'bookShow'])->name('library.book.show');
        Route::post('/biblioteca/livro/editar', [App\Http\Controllers\Panel\LibraryController::class, 'bookUpdate'])->name('library.book.update');
        Route::post('/biblioteca/livro-item/editar', [App\Http\Controllers\Panel\LibraryController::class, 'bookItemUpdate'])->name('library.book_item.update');
        Route::get('/biblioteca/emprestimos/aluno/buscar', [App\Http\Controllers\Panel\LibraryController::class, 'searchStudents'])->name('library.search.students');
        Route::get('/biblioteca/emprestimos/livro/buscar', [App\Http\Controllers\Panel\LibraryController::class, 'searchBooks'])->name('library.search.books');
    });

    /**
     * =======================
     * PAINEL -> DIPLOMAÇÃO
     * =======================
     */
    Route::prefix('painel')->group(function () {
        Route::get('/diplomacao/solicitacoes', [App\Http\Controllers\Panel\GraduationController::class, 'requests'])->name('graduation.requests');
        Route::get('/diplomacao/diplomas-emitidos', [App\Http\Controllers\Panel\GraduationController::class, 'issued'])->name('graduation.issued');
    });




    Route::get('/user/search', [App\Http\Controllers\Panel\ServiceController::class, 'search'])->name('user.search');
});

// Route::get('/teste-email', function () {
//     Mail::raw('Teste SMTP SendPulse funcionando 🚀', function ($message) {
//         $message->to('angelamaiara15@gmail.com')
//                 ->subject('Teste SMTP SendPulse');
//     });

//     return 'Email enviado!';
// });
