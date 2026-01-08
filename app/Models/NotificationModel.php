<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'is_read',
        'type',
    ];

    /**
     * Relacionamento com o usuário que recebe a notificação
     */

    public function user() {
        return $this->belongsTo(User::class, 'user_id'); // usuário que recebeu
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id'); // usuário que gerou a notificação
    }

    /**
     * Marcar a notificação como lida
     */
    public function markAsRead()
    {
        $this->is_read = true;
        $this->save();
    }
}
