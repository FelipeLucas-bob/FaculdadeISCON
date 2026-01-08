<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\CourseModel;
use App\Services\CourseService;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public static string $name = 'Cursos';

    public function __construct(protected CourseService $courseService, protected ModuleService $moduleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->courseService->getAll();

        return view(
            'admin.courses.courses-list',
            [
                'catName' => 'courses',
                'title' => 'Cursos',
                "breadcrumbs" => ["Cursos", "Listar Cursos"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'courses' => $courses,
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.courses.course-create',
            [
                'catName' => 'courses',
                'title' => 'Cursos',
                "breadcrumbs" => ["Cursos", "Cadastrar Cursos"],
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

        $courseData = [
            'code' => $request->code,
            'modality' => $request->modality,
            'degree' => $request->degree,
            'course' => $request->course_name,
            'status' => $request->status,
        ];

        $user = $this->courseService->create($courseData);

        return redirect()->route('course.create')->with('success', 'Curso cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(CourseModel $courseModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseModel $courseModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseModel $courseModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseModel $courseModel)
    {
        //
    }
}
