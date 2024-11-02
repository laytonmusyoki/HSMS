<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAssigning extends Model
{
    //
    protected $fillable = [
        'class_id',
        'teacher_id',
        'subject_id'
    ];

    public function teacher(){
        return $this->belongsTo(Teachers::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function subjects(){
        return $this->belongsTo(Subjects::class,'subject_id');
    }
}
