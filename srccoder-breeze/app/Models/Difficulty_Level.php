<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty_Level extends Model
{
    use HasFactory;
//    protected $fillable = [
//        'id',
//        'question_id',
//        'difficulty_level',
//    ];
    protected $guarded = [];

    public function questions(){
        return $this->belongsTo(Questions::class);
    }
}
