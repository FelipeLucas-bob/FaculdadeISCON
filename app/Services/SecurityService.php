<?php

namespace App\Services;

use App\Models\LoginLogModel;
use App\Repositories\SecurityRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SecurityService
{
    protected SecurityRepository $repository;

    public function __construct(SecurityRepository $repository)
    {
        $this->repository = $repository;
    }


    public function getLoginLogs(): Collection
    {
        return DB::table('login_logs')
            ->leftJoin('users', 'login_logs.user_id', '=', 'users.id') // inner join
            ->select(
                'login_logs.*', 
                'users.name as user_name', 
                'users.email as user_email'
            )
            ->orderByDesc('login_logs.created_at')
            ->get();
    }


}
