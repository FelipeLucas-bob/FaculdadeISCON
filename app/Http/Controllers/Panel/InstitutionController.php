<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\InstitutionModel;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{

    public static string $name = 'Instituição';

    public function __construct(protected ModuleService $moduleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $institutions = $this->institutionService->getAll();

        return view(
            'admin.institution.info',
            [
                'catName' => 'institution',
                'title' => 'Instituições',
                "breadcrumbs" => ["Instituição", "Informações"],
                'scrollspy' => 0,
                'simplePage' => 0,
                // 'institutions' => $institutions,
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InstitutionModel $institutionModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstitutionModel $institutionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstitutionModel $institutionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstitutionModel $institutionModel)
    {
        //
    }
}
