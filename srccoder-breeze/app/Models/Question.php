<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Display a listing of the resource.
     */

    public function answers(){
        return $this->hasMany(Answer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
   public function programmingLanguage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
   {
       return $this->belongsTo(ProgrammingLanguage::class);
   }
   public function technologyCategory(): \Illuminate\Database\Eloquent\Relations\HasOne
   {
       return $this->hasOne(TechnologyCategory::class);
   }
    public function bounty(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Bounty::class);
    }
    public function questionNotes(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(QuestionNotes::class);
    }



}
