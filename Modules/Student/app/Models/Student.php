<?php

namespace Modules\Student\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guard = "student";

    protected $fillable = [
        'name',
        'student_number',
        'mobile',
        'gender',
//        'avatar',
        'password',

    ];

    public function exams()
    {
        return $this->hasMany(StudentExam::class);
    }

    public function ExamQuestionsAnswers()
    {
        return $this->hasMany(StudentExamQuestionsAnswers::class, 'student_id');
    }

}
