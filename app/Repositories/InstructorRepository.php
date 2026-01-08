<?php

namespace App\Repositories;

use App\Models\InstructorModel;
use App\Models\RegistrationModel;
use Collator;
use Illuminate\Database\Eloquent\Collection;

class InstructorRepository
{
    /**
     * Get all registrations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return InstructorModel::all();
    }

    /**
     * Find a registration by ID.
     *
     * @param int $id
     * @return InstructorModel|null
     */
    public function findById(int $id): ?InstructorModel
    {
        return InstructorModel::find($id);
    }

    /**
     * Create a new registration.
     *
     * @param array $data
     * @return InstructorModel
     */
    public function create(array $data): InstructorModel
    {
        return InstructorModel::create($data);
    }

    public function save(InstructorModel $instructor)
    {
        $instructor->save();
        return $instructor;
    }
}