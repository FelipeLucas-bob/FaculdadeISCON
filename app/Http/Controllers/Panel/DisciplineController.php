<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\DisciplineModel;
use App\Services\DisciplineService;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{

    public static string $name = 'Disciplinas';

    public function __construct(protected DisciplineService $disciplineService, protected ModuleService $moduleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplines = $this->disciplineService->getAll();

        return view(
            'admin.disciplines.disciplines-list',
            [
                'catName' => 'disciplines',
                'title' => 'Disciplinas',
                "breadcrumbs" => ["Disciplinas", "Listar Disciplinas"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'disciplines' => $disciplines,
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.disciplines.discipline-create',
            [
                'catName' => 'disciplines',
                'title' => 'Disciplinas',
                "breadcrumbs" => ["Disciplinas", "Cadastrar Disciplinas"],
                'scrollspy' => 0,
                'simplePage' => 0,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       dd($request->request);
    }

    /**
     * Display the specified resource.
     */
    public function show(DisciplineModel $disciplineModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DisciplineModel $disciplineModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DisciplineModel $disciplineModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DisciplineModel $disciplineModel)
    {
        //
    }
}
