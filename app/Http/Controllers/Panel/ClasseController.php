<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\ClasseModel;
use App\Services\ClasseService;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class ClasseController extends Controller
{

    public static string $name = 'Turmas';

    public function __construct(protected ClasseService $classeService, protected ModuleService $moduleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = $this->classeService->getAll();

        return view(
            'admin.classes.classes-list',
            [
                'catName' => 'classes',
                'title' => 'Turmas',
                "breadcrumbs" => ["Turmas", "Listar Turmas"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'classes' => $classes,
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.classes.classe-create',
            [
                'catName' => 'classes',
                'title' => 'Turmas',
                "breadcrumbs" => ["Turmas", "Cadastrar Turma"],
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
    public function show(ClasseModel $classeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClasseModel $classeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClasseModel $classeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClasseModel $classeModel)
    {
        //
    }
}
