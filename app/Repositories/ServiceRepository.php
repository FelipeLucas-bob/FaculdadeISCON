<?php

namespace App\Repositories;

use App\Models\DemandModel;
use App\Models\RegistrationModel;
use App\Models\ScriptModel;
use App\Models\ServiceModel;
use App\Models\TypeModel;
use Collator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ServiceRepository
{
    /**
     * Get all registrations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return ServiceModel::all();
    }

    /**
     * Find a registration by ID.
     *
     * @param int $id
     * @return ServiceModel|null
     */
    public function findById(int $id): ?ServiceModel
    {
        return ServiceModel::find($id);
    }

    /**
     * Create a new registration.
     *
     * @param array $data
     * @return ServiceModel
     */
    public function create(array $data): ServiceModel
    {
        return ServiceModel::create($data);
    }

    public function save(ServiceModel $service)
    {
        $service->save();
        return $service;
    }


    public function saveDemand(DemandModel $demand)
    {
        $demand->save();
        return $demand;
    }

    public function saveType(TypeModel $type)
    {
        $type->save();
        return $type;
    }

    public function saveScript(ScriptModel $script)
    {
        $script->save();
        return $script;
    }

    public function getAllTypes()
    {
        $types = DB::table('types')
        ->join('sectors', 'types.sector_id', '=', 'sectors.id')
        ->join('categorys', 'types.category_id', '=', 'categorys.id')
        ->select('types.*', 'sectors.name as sector_name', 'categorys.name as category_name')
        ->get();

        return $types;
    }

}