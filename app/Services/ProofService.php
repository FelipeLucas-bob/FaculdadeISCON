<?php

namespace App\Services;

use App\Models\AnswerModel;
use App\Models\ProofModel;
use App\Models\QuestionModel;
use App\Models\RegistrationModel;
use App\Repositories\ProofRepository;
use App\Repositories\RegistrationRepository;
use DragonCode\Support\Helpers\Str;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str as SupportStr;

class ProofService
{
    protected $proofRepository;

    public function __construct(ProofRepository $proofRepository)
    {
        $this->proofRepository = $proofRepository;
    }


public function startProof($registration_id)
{
    return FacadesDB::transaction(function () use ($registration_id) {

        // 1️⃣ Criar ou recuperar prova
        $proof = ProofModel::where('registration_id', $registration_id)
            ->where('status', 'in_progress')
            ->first();

        if (!$proof) {
            $proof = new ProofModel();
            $proof->user_id = Auth::id();
            $proof->start = now();
            $proof->status = 'in_progress';
            $proof->total_questions = 10;
            $proof->hash = SupportStr::random(40);
            $proof->registration_id = $registration_id;

            $proof = $this->proofRepository->startProof($proof);
        }

        // 2️⃣ Selecionar 10 questões (GENÉRICAS)
        $questions = QuestionModel::inRandomOrder()
            ->limit(10)
            ->get();

        // 3️⃣ Criar respostas vazias
        foreach ($questions as $question) {
            AnswerModel::firstOrCreate(
                [
                    'proof_id' => $proof->id,
                    'question_id' => $question->id
                ],
                [
                    'answer' => null
                ]
            );
        }

        return $proof;
    });
}


    public function setAnswers(array $data)
    {

        $answer = new AnswerModel();
        $answer->proof_id = 1;
        $answer->question_id = $data['question_id'];
        $answer->answer = $data['answer'];

        return $this->proofRepository->saveAnswer($answer);
    }


    public function selectProofUser($user_id)
    {
        return $this->proofRepository->selectProofUser($user_id);
    }
}
