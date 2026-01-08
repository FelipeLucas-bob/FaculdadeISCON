<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvatarModel extends Model
{
    use HasFactory;

    // Força o Laravel a usar a tabela correta
    protected $table = 'avatars';

    protected $fillable = ['user_id', 'path', 'current'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
