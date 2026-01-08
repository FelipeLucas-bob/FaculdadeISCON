<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserAddressModel;
use App\Models\UserContactsModel;
use App\Models\UserInfoModel;
use App\Models\UserProfileModel;
use App\Models\UserRegistrationModel;
use App\Models\UserStatusModel;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository
{

    public function save(User $user)
    {
        $user->save();
        return $user;
    }

    public function getAll(): Collection
    {
        return User::select(
            'users.*',
            'user_registration.registration as registration_number',
            'user_info.cpf'
        )
            ->leftJoin('user_registration', 'users.id', '=', 'user_registration.user_id')
            ->leftJoin('user_info', function ($join) {
                $join->on('users.id', '=', 'user_info.user_id')
                    ->whereRaw('user_info.id = (SELECT MAX(ui2.id) FROM user_info ui2 WHERE ui2.user_id = users.id)');
            })
            ->leftJoin('user_status', 'users.id', '=', 'user_status.user_id')
            ->with(['status', 'profiles'])
            ->where('users.id', '>', 10)
            ->get();
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function saveUserStatus(UserStatusModel $userStatus): UserStatusModel
    {
        $userStatus->save();
        return $userStatus;
    }

    public function saveUserProfile(UserProfileModel $userProfile): UserProfileModel
    {
        $userProfile->save();
        return $userProfile;
    }


    public function getProfileIds(User $user): array
    {
        return $user->profiles->pluck('id')->toArray();
    }

    public function getSectorIds(User $user): array
    {
        return $user->profiles->pluck('sector_id')->unique()->toArray();
    }

    public function getUserProfilesByUserId(int $userId): Collection
    {
        // Carrega o usuário com os perfis relacionados
        $user = User::with('profiles')->find($userId);

        if (!$user) {
            throw new ModelNotFoundException("Usuário não encontrado");
        }

        return $user->profiles; // retorna Collection de perfis
    }

    public function saveContacts(UserContactsModel $contacts)
    {
        $contacts->save();
        return $contacts;
    }

    public function saveAddress(UserAddressModel $address)
    {
        $address->save();
        return $address;
    }

    public function getUserContactsByUserId(int $userId): Collection
    {
        return UserContactsModel::select('user_contacts.*', 'users.name as author_name')
            ->join('users', 'user_contacts.author_id', '=', 'users.id')
            ->where('user_contacts.user_id', $userId)
            ->get();
    }

    public function getUserAddressByUserId(int $userId): Collection
    {
        return UserAddressModel::select('user_address.*', 'users.name as author_name')
            ->join('users', 'user_address.author_id', '=', 'users.id')
            ->where('user_address.user_id', $userId)
            ->get();
    }

    public function saveInfo(UserInfoModel $info)
    {
        $info->save();
        return $info;
    }


    public function saveRegistration(UserRegistrationModel $registration)
    {
        $registration->save();
        return $registration;
    }


    public function getUserInfoByUserId(int $userId): Collection
    {
        return UserInfoModel::select('user_info.*', 'users.name as author_name')
            ->join('users', 'user_info.author_id', '=', 'users.id')
            ->where('user_info.user_id', $userId)
            ->orderBy('id', 'desc')
            ->get();
    }


    public function getNextRegistrationNumber(): string
    {
        $lastRegistration = UserRegistrationModel::orderBy('id', 'desc')->first();

        if (!$lastRegistration) {
            return 'USR0001';
        }

        $lastNumber = (int) substr($lastRegistration->registration, 3);
        $nextNumber = $lastNumber + 1;

        return 'USR' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}
