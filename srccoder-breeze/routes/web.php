<?php
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Question;
use App\Models\User;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Facades\File;



//video


//middleware runs with and inspects the request before it reaches the controller
// Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
// Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
// Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
// Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
// Route::get('/',[PostController::class, 'index'])->name('home');

//give me the slug where the post that matches you provided Post::where('slug', $post)->firstOrFail();
// Route::get('/posts',[PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);//->name('post');

//BLOG ROUTES
// The route we have created to show all blog posts
// Route::get('/blog/welcome', [\App\Http\Controllers\BlogPostController::class, 'welcome']);
Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);
//route to show one post
Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']);
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']); //shows create post form
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']); //saves the created post to the databse
Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); //shows edit post form
Route::put('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']); //commits edited post to the database
Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']); //deletes post from the database



// SRCCODER ROUTES
// Route::get('/srccoder', [\App\Http\Controllers\SrccoderController::class, 'index']);
Route::get('/srccoder/about', [\App\Http\Controllers\SrccoderController::class, 'about']);
Route::get('/srccoder/register_recaptcha', [\App\Http\Controllers\SrccoderController::class, 'register']);
Route::get('/srccoder/login', [\App\Http\Controllers\SrccoderController::class, 'login']);
Route::get('/srccoder/browse', [\App\Http\Controllers\SrccoderController::class, 'browse']);

// login 




// QUESTIONS ROUTES
// The route we have created to show all question posts
//Route::get('question', [\App\Http\Controllers\QuestionController::class, 'index']);
//route to show one post
Route::get('/question/{question}', [\App\Http\Controllers\QuestionController::class, 'show']);
Route::get('/question/create/post', [\App\Http\Controllers\QuestionController::class, 'create']); //shows create post form
Route::post('/question/create/post', [\App\Http\Controllers\QuestionController::class, 'store']); //saves the created post to the databse
Route::get('/question/{question}/edit', [\App\Http\Controllers\QuestionController::class, 'edit']); //shows edit post form
Route::put('/question/{question}/edit', [\App\Http\Controllers\QuestionController::class, 'update']); //commits edited post to the database
Route::delete('/question/{question}', [\App\Http\Controllers\QuestionController::class, 'destroy']); //deletes post from the database

//BLOG ROUTES
// The route we have created to show all answer posts
Route::get('answer', [\App\Http\Controllers\AnswerController::class, 'index']);
//route to show one post
Route::get('answer/{answer}', [\App\Http\Controllers\AnswerController::class, 'show']);
Route::get('answer/create/post', [\App\Http\Controllers\AnswerController::class, 'create']); //shows create post form
Route::post('answer/create/post', [\App\Http\Controllers\AnswerController::class, 'store']); //saves the created post to the databse
Route::get('answer/{answer}/edit', [\App\Http\Controllers\AnswerController::class, 'edit']); //shows edit post form
Route::put('answer/{answer}/edit', [\App\Http\Controllers\AnswerController::class, 'update']); //commits edited post to the database
Route::delete('answer/{answer}', [\App\Http\Controllers\AnswerController::class, 'destroy']); //deletes post from the database

//DEFAULT BREEZE ROUTES
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
;
Route::get('/question', function () {
    return view('question.index', [
                    'questions' => Question::all()
    ]);
})->middleware(['auth', 'verified'])->name('question');


Route::get('/browse-guest', function () {
    return view('browse', [
        'questions' => Question::all()
    ]);
})->name('browse-guest');

Route::get('/browse', function () {
    return view('browse', [
        'questions' => Question::all()
    ]);
})->middleware(['auth', 'verified'])->name('browse');

Route::get('/srccoder', function () {
    return view('srccoder.index');
})->middleware(['auth', 'verified'])->name('srccoder');


Route::get('/blog-welcome', function () {
    return view('blog.index', [
        'posts' => BlogPost::all()
    ]);
})->middleware(['auth', 'verified'])->name('blog-welcome');


Route::get('/posts', function () {
    return view('posts.index', [
        'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
    ]);
})->middleware(['auth', 'verified'])->name('posts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// FormController ROUTES
Route::get('user/create', [ FormController::class, 'create' ]);
Route::post('user/create', [ FormController::class, 'store' ]);

// Form Example route
Route::get('/form',function() {
    return view('form');
});

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
