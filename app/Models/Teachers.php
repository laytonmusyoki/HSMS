<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    //
    protected $fillable=[
        'name',
        'subjects'
    ];

    public function department(){
        return $this->hasOne(DepartmentModel::class,);
    }
}
