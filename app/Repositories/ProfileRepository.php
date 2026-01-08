<?php

namespace App\Repositories;

use App\Models\ProfileModel;
use App\Models\UserProfileHistoryModel;
use App\Models\UserProfileModel;
use Illuminate\Support\Collection;

class ProfileRepository
{
    public function all(): Collection
    {
        return ProfileModel::with(['sector'])
        ->where('id', '>', 2)
        ->get();
    }

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

    public function saveUserProfileHistory(UserProfileHistoryModel $userProfileHistoryModel): UserProfileHistoryModel
    {
        $userProfileHistoryModel->save();

        return $userProfileHistoryModel;
    }

    public function getUserProfile(int $userId): ?UserProfileModel
    {
        return UserProfileModel::where('user_id', $userId)->first();
    }

    public function updateUserProfile(UserProfileModel $userProfile): UserProfileModel
    {

        // dd($userProfile->profile_id);

        $userProfileModel = UserProfileModel::where('user_id', $userProfile->user_id)->firstOrFail();
        $userProfileModel->profile_id = $userProfile->profile_id;
        $userProfileModel->save();

        // dd($userProfileModel);
        return $userProfileModel;

    }

}
