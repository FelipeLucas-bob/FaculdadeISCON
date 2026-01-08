<?php

namespace App\Services;

use App\Models\CourseModel;
use App\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

Class CourseService
{
    protected $courseRepository; 

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getAll(): Collection
    {
        return $this->courseRepository->getAll();
    }

    public function create(array $data)
    {

        $course = new CourseModel();
        $course->author_id = Auth::user()->id;
        $course->code = $data['code'];
        $course->modality = $data['modality'];
        $course->degree = $data['degree'];
        $course->course = $data['course'];  
        $course->status = $data['status'];

        return $this->courseRepository->save($course);
    }


}