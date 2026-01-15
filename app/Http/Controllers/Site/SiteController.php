<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\ModuleService;
use App\Services\RegistrationService;
use App\Services\SiteService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public static string $name = 'Site';

    public function __construct(
            protected SiteService $siteService, 
            protected ModuleService $moduleService, 
            protected UserService $service,
            protected RegistrationService $registrationService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'site.index',
            [
                'catName' => 'index',
                'title' => 'Acessar Sistema',
                "breadcrumbs" => ["Site", "Início"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function about()
    {
        return view(
            'site.index',
            [
                'catName' => 'about',
                'title' => 'Sobre a ISCON',
                "breadcrumbs" => ["Site", "Sobre"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function courses()
    {
        return view(
            'site.index',
            [
                'catName' => 'courses',
                'title' => 'Nossos Cursos',
                "breadcrumbs" => ["Site", "Cursos"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function courseDetails()
    {
        return view(
            'site.index',
            [
                'catName' => 'course_details',
                'title' => 'Detalhes do Curso',
                "breadcrumbs" => ["Site", "Detalhes do Curso"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function instructors()
    {
        return view(
            'site.index',
            [
                'catName' => 'instructors',
                'title' => 'Professores',
                "breadcrumbs" => ["Site", "Professores"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function instructorDetails()
    {
        return view(
            'site.index',
            [
                'catName' => 'instructor_details',
                'title' => 'Perfil do Professor',
                "breadcrumbs" => ["Site", "Professor"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function blog()
    {
        return view(
            'site.index',
            [
                'catName' => 'blog',
                'title' => 'Notícias',
                "breadcrumbs" => ["Site", "Notícias"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function blogDetails()
    {
        return view(
            'site.index',
            [
                'catName' => 'blog_details',
                'title' => 'Detalhes da Notícia',
                "breadcrumbs" => ["Site", "Detalhes da Notícia"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function events()
    {
        return view(
            'site.index',
            [
                'catName' => 'events',
                'title' => 'Eventos',
                "breadcrumbs" => ["Site", "Eventos"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function eventDetails()
    {
        return view(
            'site.index',
            [
                'catName' => 'event_details',
                'title' => 'Detalhes do Evento',
                "breadcrumbs" => ["Site", "Detalhes do Evento"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function terms()
    {
        return view(
            'site.index',
            [
                'catName' => 'terms',
                'title' => 'Termos de Uso',
                "breadcrumbs" => ["Site", "Termos"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function privacy()
    {
        return view(
            'site.index',
            [
                'catName' => 'privacy',
                'title' => 'Política de Privacidade',
                "breadcrumbs" => ["Site", "Privacidade"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function contacts()
    {
        return view(
            'site.index',
            [
                'catName' => 'contacts',
                'title' => 'Contatos',
                "breadcrumbs" => ["Site", "Contatos"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }

    public function contactsTalk(Request $request)
    {
        $talkData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        $user = $this->siteService->createTalk($talkData);

        return redirect()->route('site.contacts')->with('success', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
    }

    public function enroll()
    {
        return view(
            'site.index',
            [
                'catName' => 'enroll',
                'title' => 'Matrícula',
                "breadcrumbs" => ["Site", "Processo Seletivo"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }


    public function enrollStore(Request $request)
    {

        // dd($request->request);
        try {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'active' => 1,
                'password' => str_replace(['.', '-'], '', $request->cpf),
            ];

            $user = $this->service->createUser($userData);

            // dd($user);
            $userId = $user->id;

            $this->service->setUserStatus($user, true);
            $this->service->setUserProfile($user, 7);

            $userInfo = [
                'user_id' => $userId,
                'author_id' => $userId,
                'name' => $userData['name'],
                'email' => $userData['email'],
                'cpf' => $request->cpf
            ];
            $this->service->setUserInfo($userInfo);


            $cpf = str_replace(['.', '-'], '', $request->cpf);
            // // Verifica se já existe um usuário com o CPF informado apenas pelo resultado da query
            // $existingUser = DB::table('user_info')->where('cpf', $cpf)->first();
            // if ($existingUser) {
            //     return redirect()->route('site.enroll')->with('error', 'O CPF informado já está cadastrado. Por favor <a href="' . route('login') . '">realize o login</a> para continuar.')->with('html_error', true);
            // }
            $userRegistration = [
                'user_id' => $userId,
                'profile_id' => 7,
                'name' => $userData['name'],
                'email' => $userData['email'],
                'cpf' => $request->cpf
            ];
            $this->service->setUserRegistration($userRegistration);

            $registrationData = [
                'author_id' => $userId,
                'user_id' => $userId,
                'phone' => $request->phone,
                'course' => $request->course,
                'education' => $request->education,
                'experience' => $request->experience,
                'motivation' => $request->motivation,
                'admission_type' => $request->admission_type,
                'terms' => $request->terms ? 1 : 0,
            ];

            $user = $this->registrationService->createCandidate($registrationData);

            return redirect()->route('panel.sign_in')->with('success', 'Inscrição realizada com sucesso!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Duplicate entry error code for MySQL
                return redirect()->route('site.enroll')->with('error', 'O e-mail informado já está cadastrado.');
            }
            return redirect()->route('site.enroll')->with('error', 'Ocorreu um erro ao realizar a inscrição: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('site.enroll')->with('error', 'Ocorreu um erro ao realizar a inscrição: ' . $e->getMessage());
        }

    }


}
