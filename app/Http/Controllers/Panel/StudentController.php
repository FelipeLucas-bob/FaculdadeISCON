<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\StudentModel;
use App\Models\UserInfoModel;
use App\Services\ModuleService;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public static string $name = 'Alunos';

    public function __construct(protected StudentService $studantService, protected ModuleService $moduleService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->studantService->getAll();

        return view(
            'admin.students.students-list',
            [
                'catName' => 'students',
                'title' => 'Alunos',
                "breadcrumbs" => ["Alunos", "Listar Alunos"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'students' => $students,
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.students.student-create',
            [
                'catName' => 'students',
                'title' => 'Alunos',
                "breadcrumbs" => ["Alunos", "Listar Alunos"],
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentModel $StudentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentModel $StudentModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentModel $StudentModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentModel $StudentModel)
    {
        //
    }

    public function search(Request $request)
    {
        $cpf = preg_replace('/\D/', '', $request->cpf); // remove máscara

        $aluno = UserInfoModel::leftJoin('user_contacts', 'user_contacts.user_id', '=', 'user_info.user_id')
            ->where('user_info.cpf', $cpf)
            ->select('user_info.*', 'user_contacts.*') // campos que deseja trazer
            ->first();

        if ($aluno) {
            return response()->json([
                'encontrado' => true,
                'mensagem' => 'Usuário encontrado. Você pode prosseguir com o registro do atendimento.',
                'aluno' => [
                    'name' => $aluno->name,
                    'email' => $aluno->email,
                    'telephone' => $aluno->telephone,
                    'phone' => $aluno->phone,
                    'whatsapp' => $aluno->whatsapp,
                ]
            ]);
        }

        return response()->json([
            'encontrado' => false,
            'mensagem' => 'Usuário não encontrado. Você pode prosseguir com o registro do atendimento.',
            'aluno' => null
        ]);
    }

}
