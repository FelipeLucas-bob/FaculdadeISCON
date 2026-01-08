<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublisherModel extends Model
{
    use HasFactory;

    protected $table = 'publishers';

    protected $fillable = [
        'book_id',
        'user_id',
        'loan_date',
        'due_date',
        'return_date',
        'status',
    ];

    // Um empréstimo pertence a um livro
    public function book()
    {
        return $this->belongsTo(BookModel::class);
    }

    // Um empréstimo pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
