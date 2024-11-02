<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'admission_number',
        'class_id',
        'stream_id',
        'dormitory',
        'medical_conditions',
        'allergies',
        'emergency_contact',
        'parent_name',
        'relationship',
        'parent_phone',
        'parent_email',
    ];

    public function classes(){
        return $this->belongsTo(Classes::class,'id');
    }
}
