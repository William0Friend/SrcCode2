<?php

namespace App\Models;

//mine
use App\Events\ChirpCreated;
//end mine
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
    ];
    protected $dispatchesEvents = [

        'created' => ChirpCreated::class,

    ];
    public function user(): BelongsTo

    {
        return $this->belongsTo(User::class);
    }
}
