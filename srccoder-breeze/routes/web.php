<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//video

Route::get('/', function () {
    
    //final
    //$posts = Post::all();
    return view('posts', [
        'posts' => Post::all()
    ]);
    //$files = File::files(resource_path("posts"));
    //1
    // $posts = [];
//3
    // $posts = collect(File::files(resource_path("posts")))
    // ->map(function ($file){
    //     return  YamlFrontMatter::parseFile($file);
    // })
    // ->map(function ($document){
    //     //s$document = YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // });

    //2
    // $posts = array_map(function ($file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);

    //1
    // foreach ($files as $file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     $posts [] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );

    // }
    // ddd($posts);
    
    // $posts = Post::all();
    // ddd($posts);
    // return view('posts', [
    //     'posts' => $posts
    // ]);
});

Route::get('posts/{posts}', function ($slug) {
    
//find a post by it's slug and pass it to  a view called "post"
    return view('post', [
        'post' => Post::findOrFail($slug)
    ]);


})->where('post','[A-z_\-]+');



//blog-tut
Route::get('/blog', function () {
    return view('blog');
});

// The route we have created to show all blog posts
Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);
//route to show one post
Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']);
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']); //shows create post form
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']); //saves the created post to the databse

Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); //shows edit post form

Route::put('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']); //commits edited post to the database 

Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']); //deletes post from the database


//end mine
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
