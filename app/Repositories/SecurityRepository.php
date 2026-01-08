<?php

namespace App\Repositories;

use App\Models\ProfileModel;
use App\Models\UserProfileHistoryModel;
use App\Models\UserProfileModel;
use Illuminate\Support\Collection;

class SecurityRepository
{

    public function find(int $id): ?ProfileModel
    {
        return ProfileModel::with('sector')->find($id);
    }

    public function findBySector(int $sectorId): Collection
    {
        return ProfileModel::where('sector_id', $sectorId)->with('sector')->get();
    }

    public function save(ProfileModel $profileModel): ProfileModel
    {
        $profileModel->save();

        return $profileModel;
    }

    public function update(ProfileModel $profile, array $data): bool
    {
        return $profile->update($data);
    }

    public function delete(ProfileModel $profile): bool
    {
        return $profile->delete();
    }


}
