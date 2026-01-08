<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginLogModel extends Model
{

    protected $table = 'login_logs';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'user_id',
        'email',
        'ip_address',
        'user_agent',
        'success',
    ];

    /**
     * Relação com o usuário
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}