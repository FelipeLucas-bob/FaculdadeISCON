<?php

namespace App\Repositories;

use App\Models\AnswerModel;
use App\Models\ProofModel;
use App\Models\RegistrationModel;
use Collator;
use Illuminate\Database\Eloquent\Collection;

class RegistrationRepository
{
    /**
     * Get all registrations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return RegistrationModel::join('users', 'registrations.user_id', '=', 'users.id')
            ->join('user_info', 'user_info.user_id', '=', 'users.id')
            ->select('registrations.*', 'users.id as user_id', 'users.name as name', 'users.email as email', 'user_info.cpf as cpf')
            ->get();
    }

    /**
     * Find a registration by ID.
     *
     * @param int $id
     * @return RegistrationModel|null
     */
    public function findById(int $id): ?RegistrationModel
    {
        return RegistrationModel::find($id);
    }

    /**
     * Create a new registration.
     *
     * @param array $data
     * @return RegistrationModel
     */
    public function create(array $data): RegistrationModel
    {
        return RegistrationModel::create($data);
    }

    public function save(RegistrationModel $registration)
    {
        $registration->save();
        return $registration;
    }

    public function startProof(ProofModel $proof)
    {
        $proof->save();
        return $proof;
    }

    public function saveAnswer(AnswerModel $answer)
    {
        $answer->save();
        return $answer;
    }

    public function selectProofUser(int $userId): ?RegistrationModel
    {
        return RegistrationModel::where('user_id', $userId)->first();
    }

    public function selectRegistrationUser(int $userId): Collection
    {
        return RegistrationModel::select(
            'registrations.*',
            'registrations.id as reg_id',
            'proofs.id as proof_id',
            'proofs.status'
        )
            ->leftJoin('proofs', 'proofs.registration_id', '=', 'registrations.id')
            ->where('registrations.user_id', $userId)
            ->get();
    }
}
