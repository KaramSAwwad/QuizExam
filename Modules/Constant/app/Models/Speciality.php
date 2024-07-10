<?php

namespace Modules\Constant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Constant\Database\Factories\SpecialityFactory;
use Modules\Exam\Models\Exam;
use Modules\Teacher\Models\Teacher;

class Speciality extends Model
{
    use HasFactory,softDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'code',
    ];
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
    public function exams(){
        return $this->hasMany(Exam::class);
    }

}
