<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\ModuleService;
use App\Services\SecurityService;
use Illuminate\Support\Facades\DB;

class AdminSecurityController extends Controller{

    public static string $name = 'Segurança';

    public function __construct(protected SecurityService $securityService, protected ModuleService $moduleService)
    {
    }

    public function logs()
    {


        $logs = $this->securityService->getLoginLogs();               

        return view('admin.security.logs', [
            'catName' => 'security',
            'title' => 'Logs de Acesso',
            "breadcrumbs" => ["Segurança", "Logs de Acesso"],
            'scrollspy' => 0,
            'simplePage' => 0,
            'logs' => $logs
        ], compact('logs'));

    }

    public function activities()
    {
        // futuramente: lista de atividades do sistema
        return view('panel.security.activities');
    }
}
