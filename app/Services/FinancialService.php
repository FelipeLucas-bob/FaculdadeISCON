<?php

namespace App\Services;

use App\Models\FinancialModel;
use App\Repositories\FinancialRepository;
use Illuminate\Database\Eloquent\Collection;

Class FinancialService
{
    protected $finacialRepository; 

    public function __construct(FinancialRepository $finacialRepository)
    {
        $this->finacialRepository = $finacialRepository;
    }

    public function getAll(): Collection
    {
        return $this->finacialRepository->getAll();
    }

    public function createInstructor(array $data)
    {

        $financial = new FinancialModel();
        $financial->name = $data['name'];
        $financial->cpf = $data['cpf'];
        $financial->email = $data['email'];
        $financial->phone = $data['phone'];  
        $financial->course = $data['course'];
        $financial->education = $data['education'];
        $financial->experience = $data['experience'];
        $financial->motivation = $data['motivation'];
        $financial->admission_type = $data['admission_type'];
        $financial->terms = $data['terms'] ?? 0; // Default to 0 if not set

        return $this->finacialRepository->save($financial);
    }


}