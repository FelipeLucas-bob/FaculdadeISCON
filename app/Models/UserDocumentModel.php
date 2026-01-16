<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocumentModel extends Model
{
    //
    use HasFactory;

    protected $table = 'user_documents';

    // Permite atribuição em massa
    protected $fillable = [
        'user_id', // <--- adicione aqui
        'tipo',
        'arquivo',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
