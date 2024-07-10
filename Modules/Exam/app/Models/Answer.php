<?php

namespace Modules\Exam\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Exam\Database\Factories\AnswerFactory;

class Answer extends Model
{
    use HasFactory,softDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'question_id',
        'answer_text',
        'is_correct_answer',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }


}
