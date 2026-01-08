<?php

namespace App\Repositories;

use App\Models\StudentModel;
use Collator;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository
{
    /**
     * Get all registrations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return StudentModel::all();
    }

    /**
     * Find a registration by ID.
     *
     * @param int $id
     * @return StudentModel|null
     */
    public function findById(int $id): ?StudentModel
    {
        return StudentModel::find($id);
    }

    /**
     * Create a new registration.
     *
     * @param array $data
     * @return StudentModel
     */
    public function create(array $data): StudentModel
    {
        return StudentModel::create($data);
    }

    public function save(StudentModel $student)
    {
        $student->save();
        return $student;
    }
}