<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\DemandModel;
use App\Models\SectorModel;
use App\Models\ServiceModel;
use App\Models\TypeModel;
use App\Models\User;
use App\Services\ModuleService;
use App\Services\SectorService;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelLang\Publisher\Constants\Types;

class ServiceController extends Controller
{

    public static string $name = 'Atendimentos';

    public function __construct(protected ServiceService $serviceService, protected ModuleService $moduleService, protected SectorService $sectorService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->serviceService->getAll();

        return view(
            'admin.services.services-list',
            [
                'catName' => 'services',
                'title' => 'Atendimentos',
                "breadcrumbs" => ["Atendimentos", "Atendimentos"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'services' => $services,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $sectors = $this->sectorService->getAllSectors()->where('id', '!=', 1);
        $types = TypeModel::all()->where('type', '=', 1);
        $categorys = CategoryModel::all();

        return view(
            'admin.services.service-create',
            [
                'catName' => 'services',
                'title' => 'Atendimentos',
                "breadcrumbs" => ["Atendimentos", "Novo Atendimento"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'sectors' => $sectors,
                'types' => $types,
                'categorys' => $categorys
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $service = [
            'status'       => $request->status ?? 'Pendente',  // default caso não venha
            'student_name' => $request->student_name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'whatsapp'     => $request->whatsapp,
            'category_id'  => $request->category_id,
            'demand'       => $request->demand,
            'request'      => $request->request_name,
            'procedure'    => $request->procedure ?? null, // opcional
        ];


        $service = $this->serviceService->createService($service);

        return redirect()->route('service.type')->with('success', 'Serviço cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceModel $serviceModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceModel $serviceModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceModel $serviceModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceModel $serviceModel)
    {
        //
    }

    public function demand()
    {

        $users = User::all();
        $types = TypeModel::all();
        $sectors = $this->sectorService->getAllSectors()->where('id', '!=', 1);
        $demands = DB::table('demands')
            ->join('types', 'demands.type_id', '=', 'types.id')
            ->join('users as u1', 'demands.user_id', '=', 'u1.id')       // responsável
            ->join('users as u2', 'demands.author_id', '=', 'u2.id')     // autor
            ->select(
                'demands.*',
                'types.name as type_name',
                'u1.name as user_name',     // nome do responsável
                'u2.name as author_name'    // nome do autor
            )
            ->orderBy('demands.id', 'DESC')
            ->get();

        return view(
            'admin.services.demand-create',
            [
                'catName' => 'services',
                'title' => 'Demandas',
                "breadcrumbs" => ["Atendimento", "Demanda"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'users' => $users,
                'types' => $types,
                'sectors' => $sectors,
                'demands' => $demands
            ]
        );
    }

    public function chat()
    {

        return view(
            'admin.services.chat',
            [
                'catName' => 'services',
                'title' => 'Chat',
                "breadcrumbs" => ["Atendimento", "Chat"],
                'scrollspy' => 0,
                'simplePage' => 0
            ]
        );
    }

    public function types()
    {


        // dd($types);

        $sectors = $this->sectorService->getAllSectors()->where('id', '!=', 1);
        $categorys = CategoryModel::all();

        $types = $this->serviceService->getAllTypes();

        return view(
            'admin.services.type',
            [
                'catName' => 'services',
                'title' => 'Tipos',
                "breadcrumbs" => ["Atendimento", "Tipos"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'types' => $types,
                'sectors' => $sectors,
                'categorys' => $categorys
            ]
        );
    }

    public function demandStore(Request $request)
    {

        $demand = [
            'user_id' => $request->user_id,
            'type_id' => $request->type_id,
            'observation' => $request->observation,
            'priority' => $request->priority,
            'status' => 0,
        ];

        $demand = $this->serviceService->createDemand($demand);

        return redirect()->route('service.demand')->with('success', 'Demanda cadastrada com sucesso!');
    }

    public function typeStore(Request $request)
    {
        // dd($request->all());
        $type = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'sector_id' => $request->sector_id,
        ];

        $type = $this->serviceService->createType($type);

        return redirect()->route('service.types')->with('success', 'Serviço cadastrado com sucesso!');
    }


    public function getBySector($sectorId)
    {
        $demands = TypeModel::where('sector_id', 2)->get();
        return response()->json($demands);
    }

    public function scripts()
    {
        // Exemplo: busca os scripts e, se precisar, junta com setores para nome do setor
        $scripts = DB::table('scripts')
            ->join('sectors', 'scripts.sector_id', '=', 'sectors.id')
            ->select('scripts.*', 'sectors.name as sector_name')
            ->get();

        $sectors = $this->sectorService->getAllSectors()->where('id', '!=', 1);
        $types = TypeModel::all();
        $categorys = CategoryModel::all();

        return view(
            'admin.services.scripts', // Altere para a view correta da listagem de scripts
            [
                'catName' => 'maneger_services',
                'title' => 'Listagem de Scripts',
                "breadcrumbs" => ["Atendimento", "Scripts"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'scripts' => $scripts,
                'sectors' => $sectors,
                'types' => $types,
                'categorys' => $categorys
            ]
        );
    }

    public function serviceCategory($categoryId)
    {
        $types = TypeModel::where('category_id', $categoryId)
            ->select('id', 'name')
            ->get();
        return response()->json($types);
    }

    public function search(Request $request)
    {

        // dd($request->all());
        $query = \App\Models\User::query();

        if ($request->filled('search_name')) {
            $query->where('name', 'like', '%' . $request->search_name . '%');
        }
        if ($request->filled('search_cpf')) {
            $query->where('cpf', $request->search_cpf);
        }
        if ($request->filled('search_rg')) {
            $query->where('rg', $request->search_rg);
        }

        $query->where('id', '>', 10);

        $users = $query->get();

        return response()->json($users);
    }

    public function scriptStore(Request $request)
    {

        // dd($request->all());

        $script = [
            'sector_id'   => $request->sector_id,
            'category_id' => $request->category_id,
            'type'        => $request->type,
            'title'       => $request->title,
            'content'     => $request->content,
            'observation' => $request->observation ?? null,
            'version'     => 1,
        ];

        $script = $this->serviceService->createScript($script);

        return redirect()->route('service.scripts')->with('success', 'Script cadastrado com sucesso!');
    }
}
