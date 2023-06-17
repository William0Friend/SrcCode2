<?php

namespace App\Models;

use App\Models\Bounties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Http\Request;
use App\Models;

class OLDQuestion extends Model
{
    use HasFactory;
//    protected $fillable = [
//        //'id',
//        'user_id',
//        'title',
//        'body',
//        //'timpestamp',
//        'bounty_id',
//        'programming_language_id',
//        'technology_catagory_id'
//    ];
    protected $guarded = [];
    /**
     * Display a listing of the resource.
     */

    public function answers(){
        return $this->hasMany(Answers::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
//    public function programmingLanguage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
//    {
//        return $this->belongsTo(ProgrammingLanguage::class);
//    }
//    public function technologyCatagory(): \Illuminate\Database\Eloquent\Relations\HasOne
//    {
//        return $this->hasOne(TechnologyCatagory::class);
//    }
    public function bounty(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Bounties::class);
    }
    public function questionNotes(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(QuestionNotes::class);
    }

    public function questionProgrammingLanguages(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        //maybe add functionality to make this  a hasMany relationship since a lot of quwstions have multiple programming languages
        return $this->hasOne(QuestionProgrammingLanguages::class);
    }

    public function questionTechnologyCatagory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(QuestionTechnologyCatagory::class);
    }

}
