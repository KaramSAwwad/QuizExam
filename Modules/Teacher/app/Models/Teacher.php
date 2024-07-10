<?php

namespace Modules\Teacher\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Constant\Models\Speciality;
use Modules\Exam\Models\Exam;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory,softDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guard = "teacher";

    protected $fillable = [
        'name',
        'email',
        'password',
        'teacher_number',
        'mobile',
        'speciality_id',
    ];


    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
    public function exams(){
     return $this->hasMany(Exam::class);
    }

}
