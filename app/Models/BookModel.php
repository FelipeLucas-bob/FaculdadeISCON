<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'publication_year',
        'isbn',
        'copies',
        'publisher_id',
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

    public function items()
    {
        // 'book_id' é a chave estrangeira na tabela book_items
        return $this->hasMany(BookItemModel::class, 'book_id');
    }

}
