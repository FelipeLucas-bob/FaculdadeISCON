<?php

namespace App\Services;

use App\Models\SectorModel;
use App\Repositories\SectorRepository;
use Illuminate\Support\Collection;

class SectorService
{
    protected SectorRepository $repository;

    public function __construct(SectorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllSectors(): Collection
    {
        return SectorModel::with('profiles')->get();
    }

    public function getById(int $id): ?SectorModel
    {
        return $this->repository->find($id);
    }

    public function createSector(array $data): SectorModel
    {
        $sector = new SectorModel();
        $sector->name = $data['name'];
        $sector->description = $data['description'];
        $sector->user_id_creator = $data['user_id'];

        return $this->repository->save($sector);
    }

    public function updateSector(SectorModel $sector, array $data): bool
    {
        return $this->repository->update($sector, $data);
    }

    public function deleteSector(SectorModel $sector): bool
    {
        return $this->repository->delete($sector);
    }
}
