<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bounty extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function question():BelongsTo { 
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function user():BelongsTo { 
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
