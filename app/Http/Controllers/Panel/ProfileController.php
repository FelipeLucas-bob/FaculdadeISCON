<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\AvatarModel;
use App\Services\ModuleService;
use App\Services\ProfileService;
use App\Services\SectorService;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public static string $name = 'Perfil';

    public function __construct(protected UserService $userService, protected SectorService $sectorService, protected ProfileService $profileService, protected ModuleService $moduleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Verifica se o usuário logado é diferente do solicitado
        if (Auth::id() != $id) {
            abort(403, 'Acesso não autorizado.');
        }

        $user = $this->userService->findById($id);
        $user_profile = $this->showUserProfiles($id);

        // Pega o avatar atual do usuário especificado pelo $id
        $avatar = $user->avatars()->where('current', true)->first();

        $logs = $this->profileService->getUserLoginLogs($id);

        return view('admin.users.profile', [
            'catName' => 'users',
            'title' => 'Usuários',
            "breadcrumbs" => ["Usuários", "Listar Usuários"],
            'scrollspy' => 0,
            'simplePage' => 0,
            'user' => $user,
            'user_profile' => $user_profile,
            'avatar' => $avatar,  // <-- Adicionado aqui
            'logs' => $logs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {

        // Verifica se o usuário logado é diferente do solicitado
        if (Auth::id() != $id) {
            abort(403, 'Acesso não autorizado.');
        }

        $rotaArray = explode('/', $request->uri()->path());
        $rotaArrayInversa = array_reverse($rotaArray);
        $menu = reset($rotaArrayInversa);
        $menu = $menu == 'editar' ? 'usuario' : $menu;

        $user = $this->userService->findById($id);

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

        $user_info = $this->userService->getUserInfoByUserId($id);

        if (empty($user_info)) {
            $user_info = [
                'cpf' => '',
                'name' => '',
                'email' => ''
            ];
        }

        $user_contacts = $this->userService->getUserContactsByUserId($id);

        if (empty($user_contacts)) {
            $user_contacts = [
                'telephone' => '',
                'phone' => '',
                'whatsapp' => ''
            ];
        }

        $user_address = $this->userService->getUserAddressByUserId($id);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showUserProfiles(int $userId)
    {
        try {
            $profiles = $this->userService->getUserProfilesByUserId($userId);
            return $profiles[0];
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }


    public function updateStatus(Request $request)
    {
        $status = $request->status;
        // Atualiza o status do usuário
        $request->validate([
            'status' => 'required|in:1,2,3',
        ]);

        DB::table('user_status')
            ->where('user_id', Auth::id())
            ->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }


    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        // Marcar avatars antigos como não-current
        $user->avatars()->update(['current' => false]);

        // Salvar novo avatar
        $path = $request->file('avatar')->store('avatars', 'public');

        AvatarModel::create([
            'user_id' => $user->id,
            'path' => $path,
            'current' => true
        ]);

        return back()->with('success', 'Avatar atualizado!');
    }


}
