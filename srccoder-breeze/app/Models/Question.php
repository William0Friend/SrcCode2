<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Display a listing of the resource.
     */
    // will assume 'user_id' or 'question_id', and 'id'
    // basde on laravel conventions
    // public function answers(){
    //     return $this->hasMany(Answer::class, 'question_id', 'id');
    // }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
   public function programmingLanguages(): BelongsToMany
   {
       return $this->belongsToMany(ProgrammingLanguage::class,
        'question_programming_languages', 'question_id', 'programming_language_id')->withTimestamps();;
   }
   public function technologyCategories(): BelongsToMany
   {
       return $this->belongsToMany(TechnologyCategory::class,
        'question_technology_categories', 'question_id', 'technology_category_id')->withTimestamps();;
   }
    public function bounty(): HasOne
    {
        return $this->hasOne(Bounty::class, 'question_id', 'id');
    }
    // // public function questionNotes(): HasOne
    // {
    //     return $this->hasOne(QuestionNotes::class);
    // }
    public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

//     public function user()
// {
//     return $this->belongsTo(User::class);
// }

// public function bounty()
// {
//     return $this->belongsTo(Bounty::class);
// }
}
