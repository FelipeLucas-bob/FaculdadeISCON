<?php

namespace App\Services;

use App\Models\ClasseModel;
use App\Repositories\ClasseRepository;
use Illuminate\Database\Eloquent\Collection;

Class ClasseService
{
    protected $classeRepository; 

    public function __construct(ClasseRepository $classeRepository)
    {
        $this->classeRepository = $classeRepository;
    }

    public function getAll(): Collection
    {
        return $this->classeRepository->getAll();
    }

    public function create(array $data)
    {

        $classe = new ClasseModel();
        $classe->name = $data['name'];
        $classe->cpf = $data['cpf'];
        $classe->email = $data['email'];
        $classe->phone = $data['phone'];  
        $classe->course = $data['course'];
        $classe->education = $data['education'];
        $classe->experience = $data['experience'];
        $classe->motivation = $data['motivation'];
        $classe->admission_type = $data['admission_type'];
        $classe->terms = $data['terms'] ?? 0; // Default to 0 if not set

        return $this->classeRepository->save($classe);
    }


}