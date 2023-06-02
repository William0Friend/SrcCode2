<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //block none but these
    //protected $guarded = ['id'];

    //block all
    //never allow generic array to go to form's post method - stop mass assignment vulnerability
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
        //Eloquent relationships ie hasOne, hasMany, belongsTo, belongsToMany 
    public function category(){
        return $this->belongsTo(Category::class);
        //return $this->belongsTo(Category::class, 'category_id');
    }
    

    //{post:slug} in web.php
     public function getRouteKeyName(){
          //return parent::getRouteKeyName();
          return 'slug';
     }
}
