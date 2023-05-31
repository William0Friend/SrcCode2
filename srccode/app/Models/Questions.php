<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'body',
        'timpestamp',
        'bounty_id',
        'programming_language_id',
        'technology_catagory_id'
    ];
}
