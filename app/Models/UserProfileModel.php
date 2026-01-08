<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{
    use HasFactory;

    protected $table = 'user_profile';

        protected $fillable = [
        'user_id',   // 🔴 ESTE É O QUE ESTÁ FALTANDO
        'profile_id',
        'status',
        'delete',
        // outros campos que existirem na tabela
    ];


    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_profile',             // tabela pivot
            'user_profile_model_id',    // FK pivot para perfil
            'user_id'                   // FK pivot para usuário
        );
    }


}
