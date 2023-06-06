<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty_Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'difficulty_level',
    ];
}
