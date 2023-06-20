<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
// use App\Models\Image;
// use App\Models\User;
 
// $image = new Image(['message' => 'A new comment.']);
 
// $user = User::find(1);
 
// $user->images()->save($image);