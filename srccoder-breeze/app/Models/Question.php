<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Display a listing of the resource.
     */
    // will assume 'user_id' or 'question_id', and 'id'
    // basde on laravel conventions
    public function answers(){
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
   public function programmingLanguages(): BelongsToMany
   {
       return $this->belongsToMany(ProgrammingLanguage::class, 'question_programming_languages', 'question_id', 'programming_language_id');
   }
   public function technologyCategories(): BelongsToMany
   {
       return $this->belongsToMany(TechnologyCategory::class, 'question_technology_categories', 'question_id', 'technology_category_id');
   }
    public function bounty(): HasOne
    {
        return $this->hasOne(Bounty::class, 'question_id', 'id');
    }
    // public function questionNotes(): HasOne
    // {
    //     return $this->hasOne(QuestionNotes::class);
    // }



}
