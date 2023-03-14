<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;


    protected $fillable = [
        'clg_name',
        'user_id',
        'course_name',
        'start_year',
        'end_year',
    ];

}