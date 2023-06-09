<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Answer;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $fillable = [
    //    //'name',
    //    //'email',
// //        'password',
// 'id',
// 'username',
// 'email',
// 'password',
// 'stripe_id',
// 'card_brand',
// 'card_last_four',
// 'trial_ends_at',
//    ];
    protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

        //eloquent relationships
    public function upvotedAnswers()
    {
        return $this->belongsToMany(Answer::class, 'user_answer_votes');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }



    //eloquent accessor
    public function getUsernameAttribute($username): string
    {
        return ucwords($username);
    }



//Stripe

    public function addPaymentMethod($paymentMethod) 
    {
        $this->createOrGetStripeCustomer();
        $this->addPaymentMethod($paymentMethod);
        
        return $this;
    }
    
    public function removePaymentMethod($paymentMethodId) 
    {
        $paymentMethod = $this->findPaymentMethod($paymentMethodId);
        
        if ($paymentMethod) {
            $paymentMethod->delete();
        }
        
        return $this;
    }

    //eloquent mutators
//    public function setPasswordAttribute($password): void
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }



    // public function image(): MorphMany
    // {
    //     //Usage:
    //     // use App\Models\User;
    //     // $user = User::find(1);
    //     // foreach ($user->images as $image) {
    // // ...
    //         return $this->morphMany(Image::class, 'imageable');
    // }
    // // public function bestImage(): MorphOne
    // // {
    // //     return $this->morphOne(Image::class, 'imageable')->ofMany('likes', 'max');
    // // }
    // public function latestImage(): MorphOne
    // {
    //     return $this->morphOne(Image::class, 'imageable')->latestOfMany();
    // }
    // public function oldestImage(): MorphOne
    // {
    //     return $this->morphOne(Image::class, 'imageable')->oldestOfMany();
    // }
}
