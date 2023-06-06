<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Facades\File;


//video

Route::get('/',[PostController::class, 'index'])->name('home');

//give me the slug where the post that matches you provided Post::where('slug', $post)->firstOrFail();
Route::get('posts/{post:slug}', [PostController::class, 'show']);//->name('post');

//middleware runs with and inspects the request before it reaches the controller
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// SRCCODER ROUTES
Route::get('/srccoder', [\App\Http\Controllers\SrcCoderController::class, 'index']);
Route::get('/srccoder/about', [\App\Http\Controllers\RegisterRecaptchaController::class, 'about']);
Route::get('/srccoder/register_recaptcha', [\App\Http\Controllers\RegisterRecaptchaController::class, 'register']);

// QUESTIONS ROUTES
// The route we have created to show all blog posts
Route::get('/questions', [\App\Http\Controllers\BlogPostController::class, 'index']);
//route to show one post
Route::get('/questions/{question}', [\App\Http\Controllers\QuestionController::class, 'show']);
Route::get('/questions/create/post', [\App\Http\Controllers\QuestionController::class, 'create']); //shows create post form
Route::post('/questions/create/post', [\App\Http\Controllers\QuestionController::class, 'store']); //saves the created post to the databse
Route::get('/questions/{question}/edit', [\App\Http\Controllers\QuestionController::class, 'edit']); //shows edit post form
Route::put('/questions/{question}/edit', [\App\Http\Controllers\QuestionController::class, 'update']); //commits edited post to the database
Route::delete('/questions/{question}', [\App\Http\Controllers\QuestionController::class, 'destroy']); //deletes post from the database

//BLOG ROUTES
// The route we have created to show all blog posts
Route::get('/answers', [\App\Http\Controllers\AnswerController::class, 'index']);
//route to show one post
Route::get('/answers/{answer}', [\App\Http\Controllers\AnswerController::class, 'show']);
Route::get('/answers/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']); //shows create post form
Route::post('/answers/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']); //saves the created post to the databse
Route::get('/answers/{answer}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); //shows edit post form
Route::put('/answers/{answer}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']); //commits edited post to the database
Route::delete('/answers/{answer}', [\App\Http\Controllers\BlogPostController::class, 'destroy']); //deletes post from the database

//BLOG ROUTES
// The route we have created to show all blog posts
Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);
//route to show one post
Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']);
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']); //shows create post form
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']); //saves the created post to the databse
Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); //shows edit post form
Route::put('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']); //commits edited post to the database
Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']); //deletes post from the database

//DEFAULT BREEZE ROUTES
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::post('logout', [LogOutController::class, 'store'])->middleware('auth');
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
//Route model Binding aka Binding Post $post parameter to findOrFail($post)
// Route::get('authors/{author:username}', function (User $author) {
//        //change from 24 to 4 sql queris with eager loading ->load(['category','author'])
//     return view('posts.index', [
//         //'posts' => $author->posts->load(['category','author'])

//         //eager load as part of a new query to solve n+1 problem is in Post.php
//         'posts' => $author->posts,
//         'categories' => Category::all()
//     ]);
// });

//replaced in controller
// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         //change from 24 to 4 sql queris with eager loading ->load(['category','author'])
//         //'posts' => $category->posts->load(['category','author'])
//         //eager load as part of a new query to solve n+1 problem is in Post.php
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');


//blog-tut
//Route::get('/blog', function () {
//    return view('blog');
//});
//

//end mine
