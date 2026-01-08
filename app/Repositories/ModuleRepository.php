<?php

namespace App\Repositories;

use App\Models\Module;
use App\Models\ModuleModel;
use App\Models\ModuleSectorProfileModel;
use Illuminate\Database\Eloquent\Collection;

class ModuleRepository
{
    public function saveModuleAccess(ModuleSectorProfileModel $moduleModel): ModuleSectorProfileModel
    {
        $moduleModel->save();
        return $moduleModel;
    }
    public function getAll(): Collection
    {
        return ModuleModel::all();
    }

    public function findByController(string $controller): ?ModuleModel
    {
        return ModuleModel::where('controller', $controller)->first();
    }

    public function getAllModuleAccesses(): ?Collection
    {
        return ModuleSectorProfileModel::all();
    }

    public function hasAccess(int $moduleId, array $profileIds, array $sectorIds): bool
    {
        return ModuleSectorProfileModel::where('module_id', $moduleId)
            ->whereIn('profile_id', $profileIds)
            ->whereIn('sector_id', $sectorIds)
            ->exists();
    }

    public function getModuleAccessByProfileAndSector(int $moduleId, int $profileId, int $sectorId): ?ModuleSectorProfileModel
    {
        return ModuleSectorProfileModel::where('profile_id', $profileId)
            ->where('sector_id', $sectorId)
            ->where('module_id', $moduleId)
            ->get()->first();
    }

    public function getModuleAccessByProfile(int $profileId): ?Collection
    {
        return ModuleSectorProfileModel::with('module')
            ->where('profile_id', $profileId)
            ->get();
    }


    public function delete(ModuleSectorProfileModel $moduleModel): bool
    {
        return $moduleModel->delete();
    }
}
