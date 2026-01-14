<?php

namespace App\Services;

use App\Models\AnswerModel;
use App\Models\ProofModel;
use App\Models\RegistrationModel;
use App\Repositories\RegistrationRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

Class RegistrationService
{
    protected $registrationRepository; 

    public function __construct(RegistrationRepository $registrationRepository)
    {
        $this->registrationRepository = $registrationRepository;
    }

    public function getAll(): Collection
    {
        return $this->registrationRepository->getAll();
    }

    public function createCandidate(array $data)
    {

        $registration = new RegistrationModel();
        $registration->user_id = $data['user_id'];
        $registration->author_id = $data['author_id'] ?? Auth::user()->id;
        $registration->phone = $data['phone'];  
        $registration->course = $data['course'];
        $registration->education = $data['education'];
        $registration->experience = $data['experience'];
        $registration->motivation = $data['motivation'];
        $registration->admission_type = $data['admission_type'];
        $registration->terms = $data['terms'] ?? 0; // Default to 0 if not set

        return $this->registrationRepository->save($registration);
    }

    public function startProof()
    {

        $proof = new ProofModel();
        $proof->user_id = Auth::user()->id; // ou forneça o user_id conforme necessário
        $proof->start = now();
        $proof->status = 'in_progress';
        $proof->total_questions = 10;

        return $this->registrationRepository->startProof($proof);

    }

    public function setAnswers(array $data)
    {

        $answer = new AnswerModel();
        $answer->proof_id = 1;
        $answer->question_id = $data['question_id'];
        $answer->answer = $data['answer'];

        return $this->registrationRepository->saveAnswer($answer);
    }


    public function selectRegistrationUser($user_id)
    {
        return $this->registrationRepository->selectRegistrationUser($user_id);
    }




}