<?php

namespace App\Services;

use App\Exceptions\ValidationException;
use App\Http\Controllers\Panel\UserController;
use App\Http\Requests\UserPutUpdatePassword;
use App\Models\PasswordUpdateModel;
use App\Models\User;
use App\Models\UserAddressModel;
use App\Models\UserContactsModel;
use App\Models\UserInfoModel;
use App\Models\UserProfileModel;
use App\Models\UserRegistrationModel;
use App\Models\UserStatusModel;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function createUser(array $data): User
    {



        // dd($data);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->active = $data['active'];
        $user->password = bcrypt($data['password']);

        return $this->userRepository->save($user);
    }

    public function getAllUsers(): Collection
    {
        return $this->userRepository->getAll();
    }

    public function updateUser(int $userId, array $data): User
    {
        $user = $this->findById($userId);

        $user->name = $data['name'] ?? $user->name;
        $user->email = $data['email'] ?? $user->email;

        if (isset($data['password'])) {
            $user->password = bcrypt($data['password']);
        }

        return $this->userRepository->save($user);
    }

    public function updatePassword(
        string $oldPassord,
        string $newPassord,
        string $confirmPassord,
        int $userId,
        int $userSessionId,
        UserPutUpdatePassword $request): User
    {
        $rotaFinal = route('user.edit.alterar-senha', Auth::user()->id);

        if ($userId != $userSessionId) {
            throw new ValidationException(
                'O usuário pode alterar somente a própria senha',
                'warning',
                $rotaFinal
            );
        }

        $msgCriteriosValidacao = 'A senha não segue os critérios de validação';
        if (!preg_match('/\d/', $newPassord)) {
            throw new ValidationException(
                $msgCriteriosValidacao,
                'warning',
                $rotaFinal,
                $request->getCleanData(),
                [
                    'new-password' => ['A senha deve conter pelo menos um número'],
                    'confirm-password' => ['A senha deve conter pelo menos um número'],
                ]
            );
        }

        if (!preg_match('/[A-Z]/', $newPassord)) {
            throw new ValidationException(
                $msgCriteriosValidacao,
                'warning',
                $rotaFinal,
                $request->getCleanData(),
                [
                    'new-password' => ['A senha deve conter pelo menos uma letra maiúscula'],
                    'confirm-password' => ['A senha deve conter pelo menos uma letra maiúscula'],
                ]
            );
        }

        if (!preg_match('/[a-z]/', $newPassord)) {
            throw new ValidationException(
                $msgCriteriosValidacao,
                'warning',
                $rotaFinal,
                $request->getCleanData(),
                [
                    'new-password' => ['A senha deve conter pelo menos uma letra minúscula'],
                    'confirm-password' => ['A senha deve conter pelo menos uma letra minúscula'],
                ]
            );
        }

        if (!preg_match('/[@#$%&*!]/', $newPassord)) {
            throw new ValidationException(
                $msgCriteriosValidacao,
                'warning',
                $rotaFinal,
                $request->getCleanData(),
                [
                    'new-password' => ['A senha deve conter pelo menos um caractere especial (@#$%&*!)'],
                    'confirm-password' => ['A senha deve conter pelo menos um caractere especial (@#$%&*!)'],
                ]
            );
        }

        if ($newPassord != $confirmPassord) {
            throw new ValidationException(
                'Os campos, "Nova Senha" e "Confirmar Senha" não conferem',
                'warning',
                $rotaFinal,
                $request->getCleanData(),
                [
                    'new-password' => ['Este campo não confere com "Confirmar Senha"'],
                    'confirm-password' => ['Este campo não confere com "Nova Senha"'],
                ]
            );
        }

        $userFromId = $this->userRepository
            ->findById($userId);

        if (empty($userFromId)) {
            throw new ValidationException(
                'O usuário referido não pôde ser encontrado',
                'warning',
                $rotaFinal,
                $request->getCleanData()
            );
        }

        // if(!password_verify($oldPassord, $userFromId->password)) {
        //     throw new ValidationException(
        //         'A senha está incorreta',
        //         'warning',
        //         $rotaFinal,
        //         $request->getCleanData(),
        //         [
        //             'old-password' => ['Senha incorreta'],
        //         ]
        //     );
        // }

        if($oldPassord == $newPassord) {
            throw new ValidationException(
                'A nova senha não pode ser igual a senha atual',
                'warning',
                $rotaFinal,
                $request->getCleanData(),
                [
                    'new-password' => ['A nova senha não pode ser igual a senha anterior'],
                    'confirm-password' => ['A nova senha não pode ser igual a senha anterior'],
                ]
            );
        }

        $user = $this->findById($userId);

        $user->password = bcrypt($newPassord);

        return $this->userRepository->save($user);
    }

    public function findById(int $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function setUserStatus(User $user): UserStatusModel
    {
        $userStatus = new UserStatusModel();
        $userStatus->user_id = $user->id;
        $userStatus->status = true;
        $userStatus->deleted = false;

        return $this->userRepository->saveUserStatus($userStatus);
    }

    public function setUserProfile(User $user, int $profileId): UserProfileModel
    {
        $userProfile = new UserProfileModel();
        $userProfile->user_id = $user->id;
        $userProfile->profile_id = $profileId;

        return $this->userRepository->saveUserProfile($userProfile);
    }

    public function getUserProfileIds(User $user): array
    {
        return $this->userRepository->getProfileIds($user);
    }

    public function getUserSectorIds(User $user): array
    {
        return $this->userRepository->getSectorIds($user);
    }

    public function inactivateUser(int $userId, array $data): User
    {
        $user = $this->findById($userId);
        $user->active = $data['active'] ?? 0;

        return $this->userRepository->save($user);
    }

    public function getUserProfilesByUserId(int $userId): Collection
    {
        return $this->userRepository->getUserProfilesByUserId($userId);
    }

    public function editAddress(array $data)
    {

        $address = new UserAddressModel();
        $address->author_id = Auth::user()->id;
        $address->user_id = $data['user_id'];
        $address->zip_code = $data['zip_code'];
        $address->public_place = $data['public_place'];
        $address->city = $data['city'];
        $address->district = $data['district'];
        $address->complement = $data['complement'];
        $address->number = $data['number'];
        $address->uf = $data['uf'];

        return $this->userRepository->saveAddress($address);

    }

    public function editContacts(array $data)
    {

        $contacts = new UserContactsModel();
        $contacts->author_id = Auth::user()->id;
        $contacts->user_id = $data['user_id'];
        $contacts->telephone = $data['telephone'];
        $contacts->phone = $data['phone'];
        $contacts->whatsapp = $data['whatsapp'];

        return $this->userRepository->saveContacts($contacts);

    }


    public function getUserContactsByUserId(int $userId): Collection
    {
        return $this->userRepository->getUserContactsByUserId($userId);
    }

    public function getUserAddressByUserId(int $userId): Collection
    {
        return $this->userRepository->getUserAddressByUserId($userId);
    }

    public function editInfo(array $data)
    {

        $info = new UserInfoModel();
        $info->author_id = Auth::user()->id;
        $info->user_id = $data['user_id'];
        $info->name = $data['name'];
        $info->email = $data['email'];
        // Remove pontos e traços do CPF para armazenar só números
        $cpfLimpo = preg_replace('/\D/', '', $data['cpf']);
        $info->cpf = $cpfLimpo;

        return $this->userRepository->saveInfo($info);

    }

    public function getUserInfoByUserId(int $userId): Collection
    {
        return $this->userRepository->getUserInfoByUserId($userId);
    }


    public function setUserRegistration(array $data)
    {

        $profile_id = $data['profile_id'];

        switch ($profile_id) {
            case 1:
            $type_registration = 'ADMN';
            break;
            case 2:
            $type_registration = 'CAND';
            break;
            case 3:
            $type_registration = 'ALUN';
            break;
            case 4:
            $type_registration = 'PROF';
            break;
            default:
            $type_registration = 'USER';
            break;
        }

        $registration = new UserRegistrationModel();
        $registration->user_id = $data['user_id'];
        $registration->registration = $type_registration . str_pad($data['user_id'], 4, '0', STR_PAD_LEFT);

        return $this->userRepository->saveRegistration($registration);
    }


    public function setUserInfo(array $data)
    {

        $info = new UserInfoModel();
        $info->author_id = $data['author_id'] ?? Auth::user()->id;
        $info->user_id = $data['user_id'];
        $info->name = $data['name'];
        $info->email = $data['email'];
        // Remove pontos e traços do CPF para armazenar só números
        $cpfLimpo = preg_replace('/\D/', '', $data['cpf']);
        $info->cpf = $cpfLimpo;

        return $this->userRepository->saveInfo($info);
    }

    public function resetPassword($userId): User
    {


        $user_id = intVal($userId);

        $userResetPassword = User::where('id', $user_id)->firstOrFail();
        $userResetPassword->password = bcrypt('Password@2025'); // Define a senha padrão
        $userResetPassword->save();

        return $userResetPassword;
    }

    public function getProfileUserId(): int
    {
        return Auth::user()->id;
    }

    public function passwordUpdate()
    {

        $info = new PasswordUpdateModel();
        $info->user_id = Auth::user()->id;
        $info->update = true;

        return $this->userRepository->passwordUpdate($info);
    }

    public function selectUserPasswordUpadate()
    {
        return $this->userRepository->selectUserPasswordUpadate(Auth::user()->id);
    }
}