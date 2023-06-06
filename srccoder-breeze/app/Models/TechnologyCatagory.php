<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyCatagory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function technology(){
        return $this->hasMany(Technology::class);
    }

}
