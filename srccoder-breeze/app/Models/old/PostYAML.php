<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
class PostYAML
{
    public $title;
    public $excerpt;
    public $date;
    public $body;

    public $slug;
    public function __construct($title, $excerpt, $date, $body, $slug){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function find($slug)
    {
        //of all the blog posts, find the one with a slug that matched the one that was requested
        return static::all()->firstWhere('slug', $slug);

    }
    
    public static function findOrFail($slug)
    {
        //of all the blog posts, find the one with a slug that matched the one that was requested
        $post = static::find($slug);
        if (!$post){
            //abort(404);
            //throw new \Exception('No post found');
            throw new ModelNotFoundException();
        }
        return $post;
    }//old code


            // $path = file_get_contents(__DIR__ . '/../resources/posts/{$slug}.html');
    // base_path();
    // app_path();
    // resource_path();
    //  if(!file_exists($path = resource_path("/posts/{$slug}.html"))){
    //      return redirect('/');
    //      //ddd('file does not exist');
    // }

    // $post = cache()->remember("posts.{$slug}", now()->addMinutes(5), function() use ($path) {
    //     return file_get_contents($path); 
    // });

    // // $post =
    // return cache()->remember("posts.{$slug}", 1200, fn()=>file_get_contents($path));

    // return view('post', [
    //     'post'=>$post
     //]);

    

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
        ->map(function ($file){
            return  YamlFrontMatter::parseFile($file);
        })
        ->map(function ($document){
            //s$document = YamlFrontMatter::parseFile($file);
            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            );
        })->sortByDesc('date');
        });
        
    
    }
}