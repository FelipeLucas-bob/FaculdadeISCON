<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordUpdateModel extends Model
{
    use HasFactory;

    protected $table = 'password_update';

        protected $fillable = [
        'user_id',   // 🔴 ESTE É O QUE ESTÁ FALTANDO
        'update',
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
