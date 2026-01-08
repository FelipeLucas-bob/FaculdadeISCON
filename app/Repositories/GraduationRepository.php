<?php

namespace App\Repositories;

use App\Models\GraduationModel;
use Illuminate\Support\Collection;

class GraduationRepository
{
    public function all(): Collection
    {
        return GraduationModel::all();
    }

    public function find(int $id): ?GraduationModel
    {
        return GraduationModel::find($id);
    }

    public function save(GraduationModel $graduationModel)
    {
        $graduationModel->save();
        return $graduationModel;
    }
    public function update(GraduationModel $graduationModel, array $data): bool
    {
        return $graduationModel->update($data);
    }

    public function delete(GraduationModel $graduationModel): bool
    {
        return $graduationModel->delete();
    }
}
