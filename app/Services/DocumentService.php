<?php

namespace App\Services;

use App\Models\DocumentModel;
use App\Models\ServiceModel;
use App\Models\TypeModel;
use App\Repositories\DocumentRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

Class DocumentService
{
    protected $documentRepository; 

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function getAll(): Collection
    {
        return $this->documentRepository->getAll();
    }

    // public function createService(array $data)
    // {

    //     $service = new ServiceModel();
    //     $service->author_id = Auth::user()->id;
    //     $service->name = $data['name'];
    //     $service->description = $data['description'];
    //     $service->type = $data['type'];  

    //     return $this->serviceRepository->save($service);
    // }

    // public function createDemand(array $data)
    // {

    //     $demand = new DemandModel();
    //     $demand->author_id = Auth::user()->id;
    //     $demand->user_id = $data['user_id'];
    //     $demand->type_id = $data['type_id'];
    //     $demand->observation = $data['observation']; 
    //     $demand->priority = $data['priority'];  
    //     $demand->status = $data['status'];  

    //     return $this->serviceRepository->saveDemand($demand);
    // }

    // public function createType(array $data)
    // {

    //     $type = new TypeModel();
    //     $type->author_id = Auth::user()->id;
    //     $type->name = $data['name'];
    //     $type->description = $data['description'];
    //     $type->type = $data['type'];  
    //     $type->sector_id = $data['sector_id'];  

    //     return $this->serviceRepository->saveType($type);
    // }




}