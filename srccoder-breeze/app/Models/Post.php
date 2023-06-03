<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //never allow generic array to go to form's post method - stop mass assignment vulnerability
    
    //block none but these
    //protected $guarded = ['id'];

    //allow all
    protected $guarded = [];
    //must be set one by one some other way good for production
    //like $post->update(array('title' => 'new title'...));
    //block all but these
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body'//,
    //     //'published_at'
    // ];
        // Eloquent relationships ie hasOne, hasMany, belongsTo, belongsToMany 
    public function category(){
        return $this->belongsTo(Category::class);
        //return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // //to still use slugs but not {post:slug} in web.php just {post} in web.php
    //this is older and used to be the only way to do it

    //     Route::get('posts/{post}', function (Post $post) {
//         return view('post', [
//             'post' => $post
//     ]);
// // });
// //these two need to go together
//      public function getRouteKeyName(){
//           //return parent::getRouteKeyName();
//           //return attribute fo
//           return 'slug';
//      }
}
