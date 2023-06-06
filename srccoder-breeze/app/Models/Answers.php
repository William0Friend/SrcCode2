<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
//    protected $fillable = [
//        //'id',
//        'user_id',
//        'question_id',
//        'body',
//        //'timestamp',
//        'code_body',
//    ];
    protected $guarded = [];

    public function questions(){
        return $this->belongsTo(Questions::class);
    }
}
