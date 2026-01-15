<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPutUpdatePassword;
use App\Models\User;
use App\Services\ModuleService;
use App\Services\ProfileService;
use App\Services\SectorService;
use App\Services\UserService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public static string $name = 'Usuários';

    public function __construct(protected UserService $service, protected SectorService $sectorService, protected ProfileService $profileService, protected ModuleService $moduleService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = $this->service->getAllUsers();
        // dd($users->all());

        $profiles = $this->profileService->getAllProfiles();

        return view(
            'admin.users.users-list',
            [
                'catName' => 'users',
                'title' => 'Usuários',
                "breadcrumbs" => ["Usuários", "Listar Usuários"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'users' => $users,
                'userCount' => $users->count(),
                'profiles' => $profiles
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // if($request->terms = "1"){
        //     $request->profile_id = 2;
        // }

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'active' => 1,
            'password' => env('DEFAULT_PASSWORD', ''),
            'profile_id' => $request->profile_id,
        ];

        $user = $this->service->createUser($userData);
        $userId = $user->id;

        $this->service->setUserStatus($user);
        $this->service->setUserProfile($user, $request->profile_id);

        $userInfo = [
            'user_id' => $userId,
            'name' => $userData['name'],
            'email' => $userData['email'],
            'cpf' => $request->cpf
        ];
        $this->service->setUserInfo($userInfo);

        $userRegistration = [
            'user_id' => $userId,
            'name' => $userData['name'],
            'email' => $userData['email'],
            'cpf' => $request->cpf,
            'profile_id' => $request->profile_id
        ];
        $this->service->setUserRegistration($userRegistration);



        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = $this->service->findById($id);
            // $user_profile = $this->service->userProfile($id);
            $user_profile = $this->showUserProfiles($id);
            // Garante que $avatar sempre exista, mesmo que seja null
            // $avatar = $user->currentAvatar; 

            if($user){
            $avatar = $user->avatars()->where('current', true)->first();
            }

            $logs = $this->profileService->getUserLoginLogs($id);

            return view(
                'admin.users.profile',
                [
                    'catName' => 'users',
                    'title' => 'Usuários',
                    "breadcrumbs" => ["Usuários", "Listar Usuários"],
                    'scrollspy' => 0,
                    'simplePage' => 0,
                    'user' => $user,
                    'user_profile' => $user_profile,
                    'avatar' => $avatar, // <-- Adicionado aqui
                    'logs' => $logs
                ]
            );
        } catch (Exception $e) {
            Log::error('asdasd: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->route('users.index')
                ->with('error', 'Usuário não encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $rotaArray = explode('/', $request->uri()->path());
        $rotaArrayInversa = array_reverse($rotaArray);
        $menu = reset($rotaArrayInversa);
        $menu = $menu == 'editar' ? 'usuario' : $menu;

        $user = $this->service->findById($id);

        $fieldErrorList = json_decode(session('field-error-list'), true);
        if (empty($fieldErrorList)) {
            [
                'old-password' => [],
                'new-password' => [],
                'confirm-password' => [],
            ];
        }

        $fieldValueList = json_decode(session('field-value-list'), true);
        if (empty($fieldValueList)) {
            $fieldValueList = [
                'old-password' => '',
                'new-password' => '',
                'confirm-password' => '',
            ];
        }

        $profiles = $this->profileService->getAllProfiles();

        $user_profile = $this->showUserProfiles($id);

        $user_info = $this->service->getUserInfoByUserId($id);

        if (empty($user_info)) {
            $user_info = [
                'cpf' => '',
                'name' => '',
                'email' => ''
            ];
        }

        $user_contacts = $this->service->getUserContactsByUserId($id);

        if (empty($user_contacts)) {
            $user_contacts = [
                'telephone' => '',
                'phone' => '',
                'whatsapp' => ''
            ];
        }

        $user_address = $this->service->getUserAddressByUserId($id);

        if (empty($user_address)) {
            $user_address = [
                'zip_code' => '',
                'public_place' => '',
                'city' => '',
                'district' => '',
                'complement' => '',
                'number' => '',
                'uf' => ''
            ];
        }

        return view(
            'admin.users.account-settings',
            [
                'catName' => 'users',
                'title' => 'Usuários',
                "breadcrumbs" => ["Usuários", "Listar Usuários"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'user' => $user,
                'menu' => $menu,
                'fieldErrorList' => $fieldErrorList,
                'fieldValueList' => $fieldValueList,
                'profiles' => $profiles,
                'user_profile' => $user_profile,
                'user_contacts' => $user_contacts,
                'user_address' => $user_address,
                'user_info' => $user_info
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = $this->service->updateUser($id, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ?? null
        ]);

        $info = $this->service->editInfo([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
        ]);


        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Update only the password field in the specified resource in storage.
     */
    public function updatePassword(UserPutUpdatePassword $request, string $id)
    {
        $sessaoUsuarioId = Auth::user()->id;

        $requestData = $request->input();

        $user = $this->service
            ->updatePassword(
                $requestData['old-password'],
                $requestData['new-password'],
                $requestData['confirm-password'],
                $id,
                $sessaoUsuarioId,
                $request
            );

        $updatePassword = $this->service->passwordUpdate();

        return redirect()
            ->to(route('logout.get'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function settings()
    {

        $users = $this->service->getAllUsers();
        $sectors = $this->sectorService->getAllSectors()->where('id', '!=', 1);
        $profiles = $this->profileService->getAllProfiles()->where('id', '!=', 1);
        $modules = $this->moduleService->getAllModules();
        $modulesAccess = $this->moduleService->getAllModuleAcesses();

        $accessMap = [];
        foreach ($modulesAccess as $permission) {
            $accessMap[$permission->profile_id][$permission->sector_id][$permission->module_id] = true;
        }

        return view(
            'admin.users.settings',
            [
                'catName' => 'users',
                'title' => 'Configurações',
                "breadcrumbs" => ["Usuários", "Configurações"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'users' => $users,
                'sectors' => $sectors,
                'profiles' => $profiles,
                'modules' => $modules,
                'modulesAccess' => $accessMap
            ]
        );
    }

    public function sector(Request $request)
    {
        $this->sectorService->createSector([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('users.settings')->with('success', 'Setor cadastrado com sucesso!');
    }

    public function profile(Request $request)
    {

        $this->profileService->createProfile([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'sector_id' => $request->sector_id
        ]);

        return redirect()->route('users.settings')->with('success', 'Perfil cadastrado com sucesso!');
    }

    public function logoutGet()
    {
        return view('admin.auth.logout-get');
    }


    public function inactivate(Request $request)
    {
        $id = $request->user_id;

        // Busca o usuário
        $user = User::findOrFail($id);
        // Verifica o status atual
        $statusAtual = $user->active; // ou $user->ativo
        if (!$statusAtual) {
            // Atualiza o status para ativo
            $this->service->inactivateUser($id, [
                'active' => 1,
            ]);
            return redirect()->route('users.index')->with('success', 'Usuário Ativado com sucesso!');
        }
        // Atualiza o status para inativo
        $this->service->inactivateUser($id, [
            'active' => 0,
        ]);
        return redirect()->route('users.index')->with('success', 'Usuário Inativado com sucesso!');
    }

    public function userProfileUpdate(Request $request)
    {

        $this->profileService->userProfileUpdate([
            'user_id' => $request->user_id,
            'profile_id' => $request->profile_id,
        ]);

        $this->profileService->userProfileUpdateHistory([
            'user_id' => $request->user_id,
            'profile_id' => $request->profile_id,
            'author_id' => Auth::user()->id,
        ]);

        return redirect()->route('users.index')->with('success', 'Perfil do Usuário alterado com sucesso!');
    }

    public function userProfileSelect(Request $request)
    {
        $profiles = $this->profileService->getAllProfiles()->where('id', '!=', 1);

        return response()->json($profiles);
    }


    public function showUserProfiles(int $userId)
    {
        try {
            $profiles = $this->service->getUserProfilesByUserId($userId);
            return $profiles[0];
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function view(string $id)
    {

        $user = $this->service->findById($id);
        // $user_profile = $this->service->userProfile($id);
        $user_profile = $this->showUserProfiles($id);


        return view(
            'admin.users.profile',
            [
                'catName' => 'users',
                'title' => 'Usuários',
                "breadcrumbs" => ["Usuários", "Listar Usuários"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'user' => $user,
                'user_profile' => $user_profile
            ]
        );
    }

    public function editAddress(Request $request)
    {
        // dd($request->request);
        $address = $this->service->editAddress([
            'user_id' => $request->user_id,
            'zip_code' => $request->cep,
            'public_place' => $request->public_place,
            'city' => $request->city,
            'district' => $request->district,
            'complement' => $request->complemento,
            'number' => $request->numero,
            'uf' => $request->uf,
        ]);

        return redirect()->route('users.index')->with('success', 'Endereço do Usuário cadastrado com sucesso!');
    }

    public function editContacts(Request $request)
    {
        // dd($request->request);
        $contacts = $this->service->editContacts([
            'user_id' => $request->user_id,
            'telephone' => $request->telephone,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
        ]);

        return redirect()->route('users.index')->with('success', 'Contatos do Usuário cadastrado com sucesso!');
    }

    public function resetPassword(Request $request)
    {

        $user = intVal($request->user_id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado.');
        }

        // Define a senha padrão
        $defaultPassword = env('DEFAULT_PASSWORD', 'Password@2025');

        // Atualiza a senha do usuário
        $this->service->resetPassword($user);

        return redirect()->route('users.index')->with('success', 'Senha do usuário redefinida com sucesso!');
    }
}
