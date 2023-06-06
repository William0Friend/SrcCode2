<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessTokens extends Model
{
    use HasFactory;

    protected $fillable = [
        'tokenable_type', // 'App\Models\User
        'tokenable_id',
        'name',
        'token',
        'abilities',
    ];
}
