<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Services\DisciplineService;
use App\Services\InstructorService;
use App\Services\LibraryService;
use App\Services\ProofService;
use App\Services\RegistrationService;
use App\Services\StudentService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static string $name = 'Home';

    public function __construct(
        protected UserService $userService,
        protected RegistrationService $registrationService,
        protected StudentService $studentService,
        protected InstructorService $instructorService,
        protected CourseService $courseService,
        protected LibraryService $libraryService,
        protected DisciplineService $disciplineService,
        protected ProofService $proofService
    ) {}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Informações Gerais
        $users = $this->userService->getAllUsers()->count();
        $registrations = $this->registrationService->getAll()->count();
        $students = $this->studentService->getAll()->count();
        $instructors = $this->instructorService->getAll()->count();
        $courses = $this->courseService->getAll()->count();
        $disciplines = $this->disciplineService->getAll()->count();

        // Perfil 
        $profile_user_id = $this->userService->getProfileUserId();

        // Biblioteca
        $booksQtd = $this->libraryService->getAllBooks()->count();
        $booksItemsQtd = $this->libraryService->getAllBookItems()->count();
        $loansQtd = $this->libraryService->getAllLoans()->count();
        $loansQtdToday = $this->libraryService->getLoansTodayCount();
        $loansToday = $this->libraryService->getLoansToday();
        $returnsQtdToday = $this->libraryService->getReturnsTodayCount();
        $returnsToday = $this->libraryService->getReturnsToday();

        // Processo Seletivo
        $user_id = Auth::user()->id;
        $proofs = $this->proofService->selectProofUser($user_id);

        $registrations = $this->registrationService->selectRegistrationUser($user_id);

        $passwordUpdate = $this->userService->selectUserPasswordUpadate()->count();

        return view(
            'admin/home/home',
            [
                'catName' => 'home',
                'title' => 'Início',
                "breadcrumbs" => ["Home", "Início"],
                'scrollspy' => 0,
                'simplePage' => 0,
                'users' => $users,
                'registrations' => $registrations,
                'students' => $students,
                'instructors' => $instructors,
                'courses' => $courses,
                'disciplines' => $disciplines,
                'profile_user_id' => $profile_user_id,
                'loansToday' => $loansToday,
                'loansQtd' => $loansQtd,
                'loansQtdToday' => $loansQtdToday,
                'returnsToday' => $returnsToday,
                'returnsQtdToday' => $returnsQtdToday,
                'booksQtd' => $booksQtd,
                'booksItemsQtd' => $booksItemsQtd,
                'teste' => 'teste',
                'proofs' => $proofs,
                'registrations' => $registrations,
                'passwordUpdate'=> $passwordUpdate,
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sign_in()
    {

        return view(
            'admin/login/login',
            [
                'catName' => 'auth',
                'title' => 'Acessar Sistema',
                "breadcrumbs" => ["Authentication", "Sign In"],
                'scrollspy' => 0,
                'simplePage' => 1
            ]
        );
    }
}
