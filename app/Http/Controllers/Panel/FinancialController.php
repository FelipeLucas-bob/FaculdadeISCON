<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\FinancialModel;
use App\Services\FinancialService;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class FinancialController extends Controller
{

    public static string $name = 'Financeiro';

    public function __construct(protected FinancialService $financialService, protected ModuleService $moduleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financial = $this->financialService->getAll();

        return view(
            'admin.financial.financial-list',
            [
                'catName' => 'financial',
                'title' => 'Financeiro',
                "breadcrumbs" => ["Financeiro", "Mensalidades"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'financial' => $financial,
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.financial.financial-create',
            [
                'catName' => 'financial',
                'title' => 'Financeiro',
                "breadcrumbs" => ["Financeiro", "Mensalidades"],
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
    public function show(FinancialModel $financialModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinancialModel $financialModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinancialModel $financialModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialModel $financialModel)
    {
        //
    }
}
