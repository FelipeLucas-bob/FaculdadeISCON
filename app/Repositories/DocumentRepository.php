<?php

namespace App\Repositories;

use App\Models\DocumentModel;
use App\Models\ServiceModel;
use App\Models\TypeModel;
use Collator;
use Illuminate\Database\Eloquent\Collection;

class DocumentRepository
{
    /**
     * Get all registrations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return DocumentModel::all();
    }

    /**
     * Find a registration by ID.
     *
     * @param int $id
     * @return DocumentModel|null
     */
    public function findById(int $id): ?DocumentModel
    {
        return DocumentModel::find($id);
    }

    /**
     * Create a new registration.
     *
     * @param array $data
     * @return DocumentModel
     */
    public function create(array $data): DocumentModel
    {
        return DocumentModel::create($data);
    }

    public function save(DocumentModel $document)
    {
        $document->save();
        return $document;
    }


    // public function saveDemand(DemandModel $demand)
    // {
    //     $demand->save();
    //     return $demand;
    // }

    // public function saveType(TypeModel $type)
    // {
    //     $type->save();
    //     return $type;
    // }
}