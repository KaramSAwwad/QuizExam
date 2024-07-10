<?php

namespace Modules\Exam\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Exam\Database\Factories\QuestionFactory;

class Question extends Model
{
    use HasFactory,softDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'exam_id',
        'question_title',
        'question_text',
        'question_image',
        'mark',
    ];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }


}
