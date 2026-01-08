<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\ModuleService;

class CheckModuleAccess
{
    protected ModuleService $service;

    public function __construct(ModuleService $service)
    {
        $this->service = $service;
    }

    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $controller = class_basename($request->route()->getController());

        if (!$this->service->userHasAccessToController($user, $controller)) {
            abort(403, 'Acesso negado');
        }

        return $next($request);
    }
}
