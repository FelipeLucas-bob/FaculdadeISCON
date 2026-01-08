<?php

namespace App\Services;

use App\Models\DisciplineModel;
use App\Repositories\DisciplineRepository;
use Illuminate\Database\Eloquent\Collection;

Class DisciplineService
{
    protected $disciplineRepository; 

    public function __construct(DisciplineRepository $disciplineRepository)
    {
        $this->disciplineRepository = $disciplineRepository;
    }

    public function getAll(): Collection
    {
        return $this->disciplineRepository->getAll();
    }

    public function createInstructor(array $data)
    {

        $discipline = new DisciplineModel();
        $discipline->name = $data['name'];
        $discipline->cpf = $data['cpf'];
        $discipline->email = $data['email'];
        $discipline->phone = $data['phone'];  
        $discipline->course = $data['course'];
        $discipline->education = $data['education'];
        $discipline->experience = $data['experience'];
        $discipline->motivation = $data['motivation'];
        $discipline->admission_type = $data['admission_type'];
        $discipline->terms = $data['terms'] ?? 0; // Default to 0 if not set

        return $this->disciplineRepository->save($discipline);
    }


}