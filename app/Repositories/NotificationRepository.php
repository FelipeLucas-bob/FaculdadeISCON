<?php

namespace App\Repositories;

use App\Models\NotificationModel;
use Illuminate\Support\Collection;

class NotificationRepository
{
    /**
     * Pega todas as notificações de um usuário
     */
    public function getByUser(int $userId, int $take): Collection
    {
        return NotificationModel::select(
            'notifications.*',
            'users.name as user_name',
            'users.email as user_email'
        )
            ->join('users', 'notifications.author_id', '=', 'users.id')
            ->where('notifications.user_id', $userId)
            ->orderBy('notifications.created_at', 'desc')
            ->take($take) // pega só as 5 mais recentes
            ->get();
    }

    /**
     * Cria uma nova notificação
     */
    public function create(array $data): NotificationModel
    {
        return NotificationModel::create($data);
    }

    /**
     * Marca uma notificação como lida
     */
    public function markAsRead(int $id, int $userId): bool
    {
        $notification = NotificationModel::where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if ($notification) {
            $notification->markAsRead();
            return true;
        }

        return false;
    }
}
