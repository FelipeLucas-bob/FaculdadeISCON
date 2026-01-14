<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\QuestionModel;
use App\Models\RegistrationModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ModuleService;
use App\Services\ProofService;
use App\Services\RegistrationService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{


    public static string $name = 'Processo Seletivo';

    public function __construct(
            protected RegistrationService $registrationService, 
            protected ModuleService $moduleService,
            protected ProofService $proofService,
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

        $this->proofService->startProof(10);

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

}
