<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];

    //eloquent relationships
    public function upvotedUsers()
    {
        return $this->belongsToMany(User::class, 'user_answer_votes');
    }

    public function question():BelongsTo { 
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function user():BelongsTo { 
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
}
