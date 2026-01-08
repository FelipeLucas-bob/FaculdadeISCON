<?php

namespace App\Services;

use App\Repositories\NotificationRepository;
use Illuminate\Support\Collection;

class NotificationService
{
    protected NotificationRepository $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Listar notificações de um usuário
     */
    public function getUserNotifications(int $userId, int $take): Collection
    {
        return $this->notificationRepository->getByUser($userId, $take);
    }

    /**
     * Criar notificação para um usuário
     */
    public function createNotification(array $data)
    {
        return $this->notificationRepository->create($data);
    }

    /**
     * Marcar notificação como lida
     */
    public function markNotificationAsRead(int $id, int $userId): bool
    {
        return $this->notificationRepository->markAsRead($id, $userId);
    }
}
