<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    //
    protected $fillable=[
        'name',
        'teacher_id'
    ];

    public function teacher(){
        return $this->belongsTo(Teachers::class,);
    }
}
