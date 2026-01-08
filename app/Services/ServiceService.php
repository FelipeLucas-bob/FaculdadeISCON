<?php

namespace App\Services;

use App\Models\DemandModel;
use App\Models\ScriptModel;
use App\Models\ServiceModel;
use App\Models\TypeModel;
use App\Repositories\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ServiceService
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function getAll(): Collection
    {
        return $this->serviceRepository->getAll();
    }

    public function createService(array $data)
    {

        $service = new ServiceModel();
        $service->author_id     = Auth::user()->id;            // quem cadastrou
        $service->status        = $data['status'] ?? 'Pendente';
        $service->student_name  = $data['student_name'];
        $service->email         = $data['email'] ?? null;
        $service->phone         = $data['phone'] ?? null;
        $service->whatsapp      = $data['whatsapp'] ?? null;
        $service->category_id   = $data['category_id'];
        $service->demand        = $data['demand'];
        $service->request       = $data['request'];
        $service->procedure     = $data['procedure'] ?? null;



        return $this->serviceRepository->save($service);
    }

    public function createDemand(array $data)
    {

        $demand = new DemandModel();
        $demand->author_id = Auth::user()->id;
        $demand->user_id = $data['user_id'];
        $demand->type_id = $data['type_id'];
        $demand->observation = $data['observation'];
        $demand->priority = $data['priority'];
        $demand->status = $data['status'];

        return $this->serviceRepository->saveDemand($demand);
    }

    public function createType(array $data)
    {

        $type = new TypeModel();
        $type->author_id = Auth::user()->id;
        $type->name = $data['name'];
        $type->description = $data['description'];
        $type->type = $data['type'];
        $type->sector_id = $data['sector_id'];
        $type->category_id = $data['category_id'];

        return $this->serviceRepository->saveType($type);
    }

    public function createScript(array $data)
    {
        $script = new ScriptModel();
        $script->author_id   = Auth::user()->id;
        $script->sector_id   = $data['sector_id'];
        $script->category_id = $data['category_id'];
        $script->type        = $data['type'];
        $script->title       = $data['title'];
        $script->content        = $data['content'];
        $script->observation = $data['observation'] ?? null;
        $script->version = $data['version'];

        return $this->serviceRepository->saveScript($script);
    }


    public function getAllTypes()
    {

        return $this->serviceRepository->getAllTypes();

    }
}
