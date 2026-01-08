<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\QuestionModel;
use App\Models\RegistrationModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ModuleService;
use App\Services\RegistrationService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{


    public static string $name = 'Processo Seletivo';

    public function __construct(
            protected RegistrationService $registrationService, 
            protected ModuleService $moduleService,
            protected UserService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $candidates = $this->registrationService->getAll();
        // dd($candidates);
        return view(
            'admin.registration.candidate-list',
            [
                'catName' => 'registration',
                'title' => 'Processo Seletivo',
                "breadcrumbs" => ["Processo Seletivo", "Listar Candidatos"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'candidates' => $candidates,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'active' => 1,
            'password' => str_replace(['.', '-'], '', $request->cpf),
        ];        

        $user = $this->service->createUser($userData);
        $userId = $user->id;

        $this->service->setUserStatus($user, true);
        $this->service->setUserProfile($user, 7);

        $userInfo = [
            'user_id' => $userId,
            'name' => $userData['name'],
            'email' => $userData['email'],
            'cpf' => $request->cpf
        ];
        $this->service->setUserInfo($userInfo);
        
        $userRegistration = [
            'user_id' => $userId,
            'name' => $userData['name'],
            'email' => $userData['email'],
            'cpf' => $request->cpf
        ];
        $this->service->setUserRegistration($userRegistration);

        $registrationData = [
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

        return redirect()->route('users.index')->with('success', 'Inscrição realizada com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(RegistrationModel $registrationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrationModel $registrationModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistrationModel $registrationModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrationModel $registrationModel)
    {
        //
    }

    public function proof()
    {
        $proof = $this->registrationService->startProof();

        $questions = QuestionModel::leftJoin('answers', 'questions.id', '=', 'answers.question_id')
            ->select('questions.*', 'answers.answer as user_answer')
            ->whereNull('answers.question_id') // só pega questões sem resposta
            ->get();


        return view(
            'admin.registration.proof',
            [
                'catName' => 'registration',
                'title' => 'Prova',
                "breadcrumbs" => ["Processo Seletivo", "Prova"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'proof' => $proof,
                'questions' => $questions,
            ]
        );
    }


    public function start(Request $request)
    {
        $this->registrationService->startProof();

        return redirect()->route('registrations.proof')->with('success', 'Prova iniciada com sucesso!');

    }

    public function answers(Request $request)
    {

        $answers = [
            'question_id' => $request->question_id,
            'answer' => $request->answer,
        ];

        try {
            $registration = $this->registrationService->setAnswers($answers);
            return response()->json(['success' => true, 'message' => 'Resposta salvas com sucesso!', 'registration' => $registration]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao salvar respostas: ' . $e->getMessage()], 500);
        }
    }
}
