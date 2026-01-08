<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\CourseModel;
use App\Models\InstructorModel;
use App\Models\User;
use App\Services\InstructorService;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class InstructorController extends Controller
{

    public static string $name = 'Professores';

    public function __construct(protected InstructorService $instructorService, protected ModuleService $moduleService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = $this->instructorService->getAll();

        // dd($instructors);;

        return view(
            'admin.instructors.instructors-list',
            [
                'catName' => 'instructors',
                'title' => 'Professores',
                "breadcrumbs" => ["Professores", "Listar Professores"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'instructors' => $instructors,
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $instructors = User::all();


        $instructors = $this->instructorService->getUsersInstructors();
        // dd($instructors);
        $courses = CourseModel::all();


        return view(
            'admin.instructors.instructor-create',
            [
                'catName' => 'instructors',
                'title' => 'Professores',
                "breadcrumbs" => ["Professores", "Listar Professores"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'instructors' => $instructors,
                'courses' => $courses,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $instructor = $this->instructorService->createInstructor([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
        ]);


        return redirect()->route('instructors.index')->with('success', 'Professor Registrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(InstructorModel $InstructorModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstructorModel $InstructorModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstructorModel $InstructorModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstructorModel $InstructorModel)
    {
        //
    }
}
