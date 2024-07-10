<?php

namespace Modules\Exam\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Constant\Models\Speciality;
use Modules\Exam\Database\Factories\ExamFactory;
use Modules\Student\Models\Student;
use Modules\Student\Models\StudentExam;
use Modules\Teacher\Models\Teacher;

class Exam extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'speciality_id',
        'teacher_id',
        'title',
        'num_of_questions',
        'start_at',
        'end_at',
        'is_draft',

    ];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function students()
    {
     return $this->hasMany(StudentExam::class,'exam_id');
    }

}
