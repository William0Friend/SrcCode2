<?php
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
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
use App\Http\Controllers\PaymentController;

//Questions
Route::get('/', [QuestionController::class, 'home'])->name('questions.home');
// Route::get('/', function () {
//     return view('welcome');
// });
// This will automatically create the necessary routes for the resourceful controller actions: index, create, store, show, edit, update, and destroy.
Route::resource('questions', QuestionController::class);
Route::resource('answers', AnswerController::class);
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::get('/questions/{slug}', [QuestionController::class, 'show'])->name('questions.show');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/questions/{slug}/answers/create', [AnswerController::class, 'create'])->name('answers.create');
Route::post('/questions/{slug}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('/browse', function () {
    return view('questions.browse');
})->name('questions.browse');

Route::get('/browse/data', [QuestionController::class, 'browse'])->name('questions.browse.data');

Route::get('/about', [\App\Http\Controllers\SrccoderController::class, 'about'])->name('about');
// //Route::get('/register_recaptcha', [\App\Http\Controllers\SrccoderController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
;

Route::get('/blog-welcome', function () {
    return view('blog', [
        'posts' => BlogPost::all()
    ]);
})->name('blog-welcome');
// ->middleware(['auth', 'verified'])->name('blog-welcome');

// //give me the slug where the post that matches you provided Post::where('slug', $post)->firstOrFail();
Route::get('/posts/index',[PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');

Route::get('/posts', function () {
    return view('posts', [
        'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
    ]);
})->middleware(['auth', 'verified'])->name('posts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
// Route::get('/browse', [\App\Http\Controllers\SrccoderController::class, 'browse']);

//BLOG ROUTES
Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);
// //route to show one post
Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']);
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']); //shows create post form
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']); //saves the created post to the databse
Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); //shows edit post form
Route::put('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']); //commits edited post to the database
Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']); //deletes post from the database

//upvotes
// laravel
// Route::get('/answers/{answer}/upvote', [AnswerController::class, 'upvote'])->name('answers.upvote');
// ajax
Route::post('/answers/{answer}/upvote', [AnswerController::class, 'upvote'])->name('answers.upvote');

//best answer route
Route::get('/questions/{question}/best-answer/{answer}', [QuestionController::class, 'bestAnswer'])->name('questions.best-answer');

//stripe 
Route::post('questions/{question}/award', [App\Http\Controllers\QuestionController::class, 'award'])->name('questions.award');
Route::post('charge', [App\Http\Controllers\PaymentController::class, 'charge'])->name('charge');

Route::post('/payment', [PaymentController::class, 'makePayment'])->name('payment.make');

Route::get('/billing-portal', function (Request $request) {
    return $request->user()->redirectToBillingPortal();
})->name('billing.portal');
//Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/checkout', [PaymentController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [PaymentController::class, 'store'])->name('checkout.store');

// Route::get('/payment', [PaymentController::class, function(){
//     return view('payment');
// }])->name('payment.make');

// Route::post(
//     'stripe/webhook',
//     '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
// );

require __DIR__.'/auth.php';
//require __DIR__.'/old.php';
// The route we have created to show all blog posts
// Route::get('/blog/welcome', [\App\Http\Controllers\BlogPostController::class, 'welcome']);
// Route::get('/browse', [QuestionController::class, 'browse'])->name('questions.browse');
// Route::get('/browse/data', [QuestionController::class, 'browseData'])->name('questions.browse.data');
// Route::get('/questions/datatable', [QuestionController::class, 'getDataTable'])->name('questions.datatable');
