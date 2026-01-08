<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfoModel extends Model
{
    use HasFactory;

    protected $table = 'user_info';

    protected $fillable = [
        'author_id',
        'user_id',
        'cpf',
        'rg',
        'name',
        'email',
        'date_of_birth',
    ];


    // Se quiser, pode adicionar relacionamento com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
