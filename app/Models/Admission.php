<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'student_dob',
        'parent_name',
        'parent_phone',
        'address',
        'status'
    ];
}
