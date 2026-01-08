<?php

namespace App\Services;

use App\Models\StudentModel;
use App\Repositories\StudentRepository;
use Illuminate\Database\Eloquent\Collection;

Class StudentService
{
    protected $studentRepository; 

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAll(): Collection
    {
        return $this->studentRepository->getAll();
    }

    public function createSdutant(array $data)
    {

        $student = new StudentModel();
        $student->name = $data['name'];
        $student->cpf = $data['cpf'];
        $student->email = $data['email'];
        $student->phone = $data['phone'];  
        $student->course = $data['course'];
        $student->education = $data['education'];
        $student->experience = $data['experience'];
        $student->motivation = $data['motivation'];
        $student->admission_type = $data['admission_type'];
        $student->terms = $data['terms'] ?? 0; // Default to 0 if not set

        return $this->studentRepository->save($student);
    }


}