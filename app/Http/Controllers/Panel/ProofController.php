<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\QuestionModel;
use App\Services\ModuleService;
use Illuminate\Http\Request;
use App\Services\ProofService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class ProofController extends Controller
{


    public static string $name = 'Prova';

    public function __construct(
            protected ProofService $proofService, 
            protected ModuleService $moduleService,
            protected UserService $service)
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
    public function proof(Request $request)
    {
        
        $user_id = Auth::user()->id;

        $proof_user_id = $this->proofService->selectProofUser($user_id); 

        if($proof_user_id){
            // dd($proof_user_id);
        }else{
            die('não existe');
        }

        $registratio_id = $request->post('registration_id');

        $proof = $this->proofService->startProof($registratio_id);

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
                // 'start' => $proof_user_id->start
            ]
        );
    }


    public function start(Request $request)
    {
        $this->proofService->startProof(12);

        return redirect()->route('registrations.proof')->with('success', 'Prova iniciada com sucesso!');

    }

    public function answers(Request $request)
    {

        $answers = [
            'question_id' => $request->question_id,
            'answer' => $request->answer,
        ];

        try {
            $registration = $this->proofService->setAnswers($answers);
            return response()->json(['success' => true, 'message' => 'Resposta salvas com sucesso!', 'registration' => $registration]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao salvar respostas: ' . $e->getMessage()], 500);
        }
    }

}
