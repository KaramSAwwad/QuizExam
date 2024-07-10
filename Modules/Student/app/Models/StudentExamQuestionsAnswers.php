<?php

namespace Modules\Student\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Exam\Models\Answer;
use Modules\Exam\Models\Exam;
use Modules\Exam\Models\Question;
use Modules\Student\Database\Factories\StudentExamQuestionsAnswersFactory;

class StudentExamQuestionsAnswers extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'student_id',
        'exam_id',
        'question_id',
        'answer_id',
        'mark',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function answer(){
        return $this->belongsTo(Answer::class);
    }


}
