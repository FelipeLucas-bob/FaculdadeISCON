<?php

namespace App\Services;

use App\Models\LoginLogModel;
use App\Models\ProfileModel;
use App\Models\UserProfileHistoryModel;
use App\Models\UserProfileModel;
use App\Repositories\ProfileRepository;
use Illuminate\Support\Collection;

class ProfileService
{
    protected ProfileRepository $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllProfiles(): Collection
    {
        return $this->repository->all();
    }

    public function getById(int $id): ?ProfileModel
    {
        return $this->repository->find($id);
    }

    public function getBySector(int $sectorId): Collection
    {
        return $this->repository->findBySector($sectorId);
    }

    public function createProfile(array $data): ProfileModel
    {
        $profile = new ProfileModel();
        $profile->name = $data['name'];
        $profile->description = $data['description'];
        $profile->user_id_creator = $data['user_id'];
        $profile->sector_id = $data['sector_id'];

        return $this->repository->save($profile);
    }

    public function updateProfile(ProfileModel $profile, array $data): bool
    {
        return $this->repository->update($profile, $data);
    }

    public function deleteProfile(ProfileModel $profile): bool
    {
        return $this->repository->delete($profile);
    }

    public function userProfileUpdate(array $data): UserProfileModel
    {

        $userProfile = new UserProfileModel();
        $userProfile->user_id = $data['user_id'];
        $userProfile->profile_id = $data['profile_id'];
        
        return $this->repository->updateUserProfile($userProfile);

    }

    public function userProfileUpdateHistory(array $data): UserProfileHistoryModel
    {
        $profile_previous_id = $this->repository->getUserProfile($data['user_id'])->profile_id ?? null;

        $userProfileHistoryModel = new UserProfileHistoryModel();
        $userProfileHistoryModel->user_id = $data['user_id'];
        $userProfileHistoryModel->profile_id = $data['profile_id'];
        $userProfileHistoryModel->profile_previous_id = $profile_previous_id;
        $userProfileHistoryModel->author_id = $data['author_id'];

        return $this->repository->saveUserProfileHistory($userProfileHistoryModel);
    }

    public function getUserLoginLogs(int $userId): Collection
    {
        return LoginLogModel::where('user_id', $userId)
        ->orderByDesc('created_at')
        ->get(); // retorna Collection
    }


}
