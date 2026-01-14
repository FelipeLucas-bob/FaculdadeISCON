<?php

namespace App\Services;

use App\Models\AnswerModel;
use App\Models\ProofModel;
use App\Models\RegistrationModel;
use App\Repositories\ProofRepository;
use App\Repositories\RegistrationRepository;
use DragonCode\Support\Helpers\Str;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str as SupportStr;

Class ProofService
{
    protected $proofRepository; 

    public function __construct(ProofRepository $proofRepository)
    {
        $this->proofRepository = $proofRepository;
    }


    public function startProof($registration_id)
    {

        $proof = new ProofModel();
        $proof->user_id = Auth::user()->id; // ou forneça o user_id conforme necessário
        $proof->start = now();
        $proof->status = 'in_progress';
        $proof->total_questions = 10;
        $proof->hash = SupportStr::random(40);
        $proof->registration_id = $registration_id;

        return $this->proofRepository->startProof($proof);

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