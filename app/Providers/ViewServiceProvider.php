<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Sidebar
        View::composer('layouts.sidebar', function ($view) {
            $sidebar = app(\App\Services\ModuleService::class)->getSideBarItems();
            $view->with('sidebarItems', $sidebar);
        });

        // Navbar notifications
        View::composer('layouts.navbar', function ($view) {
            $userId = Auth::id();
            if ($userId) {
                $notifications = app(NotificationService::class)->getUserNotifications($userId, 5);
            } else {
                $notifications = collect(); // vazio se não estiver logado
            }

            // dd($notifications);

            $view->with('notifications', $notifications);
        });
    }
}
