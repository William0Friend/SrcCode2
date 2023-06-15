<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OLDDifficulty extends Model
{
    use HasFactory;
//    protected $fillable = [
//        'id',
//        'question_id',
//        'difficulty',
//    ];
    protected $guarded = [];

    public function questions(){
        return $this->belongsTo(Questions::class);
    }
}
