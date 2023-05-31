<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTechnologyCatagory extends Model
{
    use HasFactory;
    protected $fillable = [
        //'id',
        'user_id',
        'question_id',
        'technology_catagory_id',
    ];
}
