<?php

namespace Modules\Student\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Exam\Models\Exam;
use Modules\Student\Database\Factories\StudentExamFactory;

class StudentExam extends Model
{
    use HasFactory, softDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'exam_id',
        'student_id',
        'mark',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function finishedExams()
    {
      return $this->hasMany(StudentExamQuestionsAnswers::class, 'student_id');
    }

}
