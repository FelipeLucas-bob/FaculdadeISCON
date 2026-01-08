<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanModel extends Model
{
    use HasFactory;

    protected $table = 'loans';


    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'address',
    ];

    // Uma editora pode ter vários livros
    public function books()
    {
        return $this->hasMany(BookModel::class);
    }
}
