<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatusModel extends Model
{
    use HasFactory;

    protected $table = 'user_status';

    protected $fillable = [
        'user_id',
        'status',
        'deleted', // se o campo se chama delete mesmo
    ];

    // Se quiser, pode adicionar relacionamento com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
