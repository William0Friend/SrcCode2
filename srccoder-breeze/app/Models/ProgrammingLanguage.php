<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProgrammingLanguage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questions():BelongsToMany { 
        return $this->belongsToMany(Question::class,
         'question_programming_languages', 'programming_language_id', 'question_id')->withTimestamps();;
    }

}
