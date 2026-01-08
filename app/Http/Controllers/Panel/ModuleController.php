<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{

    public static string $name = 'Módulos';

    public function __construct(
        protected ModuleService $service,
    ) {
    }

    public function store(Request $request)
    {
        $items = $request->input('items', []);

        foreach ($items as $item) {
            $moduleId = $item['module_id'] ?? null;
            $sectorId = $item['sector_id'] ?? null;
            $profileId = $item['profile_id'] ?? null;
            $selected = isset($item['selected']) && $item['selected'] == '1' ?? null;

            if (!$moduleId || !$sectorId || !$profileId) {
                continue;
            }

            if ($selected) {
                $this->service->createModuleAccess($moduleId, $profileId, $sectorId);
            } else {
                $this->service->removeModuleAccess($moduleId, $profileId, $sectorId);
            }

        }
        return redirect()->back()->with('success', 'Acesso aos módulos atualizado com sucesso.');
    }



}