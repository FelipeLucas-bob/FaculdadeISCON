<?php

namespace Database\Seeders;

use App\Models\CourseModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = [
            ['id'=>1,'author_id'=>1,'code'=>1337909,'course'=>'BIOMEDICINA','modality'=>'Presencial','degree'=>'Bacharelado','status'=>1],
            ['id'=>2,'author_id'=>1,'code'=>1441639,'course'=>'DIREITO','modality'=>'Presencial','degree'=>'Bacharelado','status'=>1],
            ['id'=>3,'author_id'=>1,'code'=>1571384,'course'=>'EDUCAÇÃO FÍSICA','modality'=>'Presencial','degree'=>'Licenciatura','status'=>1],
            ['id'=>4,'author_id'=>1,'code'=>1442048,'course'=>'ENFERMAGEM','modality'=>'Presencial','degree'=>'Bacharelado','status'=>1],
            ['id'=>5,'author_id'=>1,'code'=>1475318,'course'=>'ESTÉTICA E COSMÉTICA','modality'=>'Presencial','degree'=>'Tecnólogo','status'=>1],
            ['id'=>6,'author_id'=>1,'code'=>1454973,'course'=>'FISIOTERAPIA','modality'=>'Presencial','degree'=>'Bacharelado','status'=>1],
            ['id'=>7,'author_id'=>1,'code'=>1682192,'course'=>'FONOAUDIOLOGIA','modality'=>'Presencial','degree'=>'Bacharelado','status'=>1],
            ['id'=>8,'author_id'=>1,'code'=>1475319,'course'=>'GESTÃO DE RECURSOS HUMANOS','modality'=>'Presencial','degree'=>'Tecnólogo','status'=>1],
            ['id'=>9,'author_id'=>1,'code'=>1337910,'course'=>'GESTÃO HOSPITALAR','modality'=>'Presencial','degree'=>'Tecnólogo','status'=>1],
            ['id'=>10,'author_id'=>1,'code'=>1441640,'course'=>'PSICOLOGIA','modality'=>'Presencial','degree'=>'Bacharelado','status'=>1],
            ['id'=>11,'author_id'=>1,'code'=>1441641,'course'=>'PSICOPEDAGOGIA','modality'=>'Presencial','degree'=>'Bacharelado','status'=>1],
            ['id'=>12,'author_id'=>1,'code'=>1337908,'course'=>'RADIOLOGIA','modality'=>'Presencial','degree'=>'Tecnólogo','status'=>1],
            ['id'=>13,'author_id'=>1,'code'=>1337911,'course'=>'TEOLOGIA','modality'=>'Presencial','degree'=>'Bacharelado','status'=>1],
        ];

        CourseModel::insert($cursos);
    }
}
