<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\NotificationModel;
use App\Services\ModuleService;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public static string $name = 'Notificações';

    public function __construct(protected NotificationService $notificationService, protected ModuleService $moduleService) {}

    /**
     * Listar todas as notificações do usuário logado
     */
    public function index()
    {
        $notifications = $this->notificationService->getUserNotifications(Auth::user()->id, 9999);

        return view('admin.notifications.notifications-list', [
            'catName'     => 'notifications',
            'title'       => 'Notificações',
            'breadcrumbs' => ['Notificações', 'Lista'],
            'scrollspy'   => 0,
            'simplePage'  => 0,
            'notifications' => $notifications,
        ]);
    }

    /**
     * Marcar uma notificação como lida
     */
    public function markAsRead($id)
    {
        $notification = NotificationModel::where('user_id', Auth::id())->findOrFail($id);
        $notification->markAsRead();

        return redirect()->back();
    }

    /**
     * Criar uma nova notificação para um usuário
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'nullable|string|max:50',
        ]);

        NotificationModel::create($request->all());

        return redirect()->back()->with('success', 'Notificação criada!');
    }
}
