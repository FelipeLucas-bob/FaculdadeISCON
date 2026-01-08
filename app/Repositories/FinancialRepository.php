<?php

namespace App\Repositories;

use App\Models\FinancialModel;
use Collator;
use Illuminate\Database\Eloquent\Collection;

class FinancialRepository
{
    /**
     * Get all registrations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return FinancialModel::all();
    }

    /**
     * Find a registration by ID.
     *
     * @param int $id
     * @return FinancialModel|null
     */
    public function findById(int $id): ?FinancialModel
    {
        return FinancialModel::find($id);
    }

    /**
     * Create a new registration.
     *
     * @param array $data
     * @return FinancialModel
     */
    public function create(array $data): FinancialModel
    {
        return FinancialModel::create($data);
    }

    public function save(FinancialModel $financial)
    {
        $financial->save();
        return $financial;
    }
}