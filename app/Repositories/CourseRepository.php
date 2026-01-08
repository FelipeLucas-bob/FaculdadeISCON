<?php

namespace App\Repositories;

use App\Models\CourseModel;
use Collator;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository
{
    /**
     * Get all courses.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return CourseModel::all();
    }

    /**
     * Find a course by ID.
     *
     * @param int $id
     * @return CourseModel|null
     */
    public function findById(int $id): ?CourseModel
    {
        return CourseModel::find($id);
    }

    /**
     * Create a new course.
     *
     * @param array $data
     * @return CourseModel
     */
    public function create(array $data): CourseModel
    {
        return CourseModel::create($data);
    }

    public function save(CourseModel $course)
    {
        $course->save();
        return $course;
    }
}