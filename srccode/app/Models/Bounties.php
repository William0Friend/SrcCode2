<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bounties extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'question_id',
        'amount',
        'is_accepted',
    ];
}
