<?php

namespace App\Services;

use App\Models\InstructorModel;
use App\Models\User;
use App\Repositories\InstructorRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

Class InstructorService
{
    protected $instructorRepository; 

    public function __construct(InstructorRepository $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;
    }

    public function getAll(): Collection
    {
    return InstructorModel::join('users', 'instructors.user_id', '=', 'users.id')
                     ->join('courses', 'instructors.course_id', '=', 'courses.id')
                     ->select('instructors.*', 'users.name', 'users.email', 'courses.course')
                     ->get();
    }

    public function createInstructor(array $data)
    {

        $instructor = new InstructorModel();
        $instructor->author_id = Auth::user()->id;
        $instructor->user_id = $data['user_id'];
        $instructor->course_id = $data['course_id'];


        return $this->instructorRepository->save($instructor);
    }

    public function getUsersInstructors(): Collection
    {
        return User::join('user_profile', 'users.id', '=', 'user_profile.user_id')
                    ->select('users.*', 'user_profile.profile_id')
                    ->where('profile_id', '=' , '4')
                    ->get();
    }



}