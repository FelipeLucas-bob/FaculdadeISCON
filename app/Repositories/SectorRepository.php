<?php

namespace App\Repositories;

use App\Models\SectorModel;
use Illuminate\Support\Collection;

class SectorRepository
{
    public function all(): Collection
    {
        return SectorModel::all();
    }

    public function find(int $id): ?SectorModel
    {
        return SectorModel::find($id);
    }

    public function save(SectorModel $sectorModel)
    {
        $sectorModel->save();
        return $sectorModel;
    }
    public function update(SectorModel $sector, array $data): bool
    {
        return $sector->update($data);
    }

    public function delete(SectorModel $sector): bool
    {
        return $sector->delete();
    }
}
