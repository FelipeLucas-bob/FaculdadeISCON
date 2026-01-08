<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookItemModel extends Model
{
    use HasFactory;

    protected $table = 'book_items';

    protected $fillable = [
        'book_id',
        'code_system',
        'code_library',
        'status',
    ];

    // Livro pertence a uma editora
    public function publisher()
    {
        return $this->belongsTo(PublisherModel::class);
    }

    // Livro pode estar em vários empréstimos
    public function loans()
    {
        return $this->hasMany(LoanModel::class);
    }
}
