<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

//video
//clockwork extention gets you around this
// Route::get('/', function () {
//     Illuminate\Support\Facades\DB::listen(function($query){
//         logger($query->sql, $query->bindings);
//         //custom query here...
//         return view('posts', [
//             'posts' => Post::all()
//         ]);

//     });
// });
Route::get('/', function () {
    return view('posts', [
        //4 queries n+1 problem
        //'posts' => Post::all()
        //2 queries only
        //'posts' => Post::latest('published_at')->with('category','author')->get()
        //eager load as part of a new query to solve n+1 problem
        'posts' => Post::latest()->with(['category','author'])->get()
    ]);
});

//give me the slug where the post that matches you provided Post::where('slug', $post)->firstOrFail();
Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
]);
});
//Route model Binding aka Binding Post $post parameter to findOrFail($post)
//wildcard must match parameter/variable name
//if var mtches wildcard you want corrisponding post id
//to keep slug in uri instead of id, you must use getRouteKeyName() in Post.php and have it return slug
//this is older and used to be the only way to do it
// Route::get('posts/{post}', function (Post $post) {
//          return view('post', [
//              'post' => $post
//      ]);
//  });
//because of Late Model Binding above function and below function are equivalent
//  Route::get('posts/{post}', function ($id) {
//             return view('post', [
//                 'post' => Post::findOrFail($id)
//         ]);
//     });

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
}); 

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
}); 


//default

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




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
