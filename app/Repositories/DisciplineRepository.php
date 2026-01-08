<?php

namespace App\Repositories;

use App\Models\DisciplineModel;
use Collator;
use Illuminate\Database\Eloquent\Collection;

class DisciplineRepository
{
    /**
     * Get all disciplines.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return DisciplineModel::all();
    }

    /**
     * Find a discipline by ID.
     *
     * @param int $id
     * @return DisciplineModel|null
     */
    public function findById(int $id): ?DisciplineModel
    {
        return DisciplineModel::find($id);
    }

    /**
     * Create a new discipline.
     *
     * @param array $data
     * @return disciplineModel
     */
    public function create(array $data): DisciplineModel
    {
        return DisciplineModel::create($data);
    }

    public function save(DisciplineModel $discipline)
    {
        $discipline->save();
        return $discipline;
    }
}