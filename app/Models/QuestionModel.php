<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{

        protected $table = 'questions';

        use HasFactory;

        protected $fillable = [
                'enunciado',
                'opcao_a',
                'opcao_b',
                'opcao_c',
                'opcao_d',
                'resposta_correta',
        ];

}
