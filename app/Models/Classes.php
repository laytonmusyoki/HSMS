<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $fillable = [
        'class',
        'stream',
        'class_teacher',
    ] ;

    public function teacherAssignments()
    {
        return $this->hasMany(TeacherAssigning::class,'class_id');
    }
}
