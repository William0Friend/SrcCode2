<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
class Questions extends Model
{
    use HasFactory;
//    protected $fillable = [
//        //'id',
//        'user_id',
//        'title',
//        'body',
//        //'timpestamp',
//        'bounty_id',
//        'programming_language_id',
//        'technology_catagory_id'
//    ];
    protected $guarded = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // fetch and return all blog posts
        $posts = Questions::all(); //fetch all blog posts from DB
        //raw json
        //return $posts; //returns the fetched posts
        return view('.index', [
            'posts' => $posts,
        ]); //returns the view with posts
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => 1
        ]);

        return redirect('blog/' . $newPost->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        //
        //return $blogPost; //returns the fetched posts
        return view('blog.show', [
            'post' => $blogPost,
        ]); //returns the view with the post
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        //
        return view('blog.edit', [
            'post' => $blogPost,
        ]); //returns the edit view with the post
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $blogPost->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        //
        $blogPost->delete();

        return redirect('/blog');
    }
    public function answers(){
        return $this->hasMany(Answers::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
//    public function programmingLanguage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
//    {
//        return $this->belongsTo(ProgrammingLanguage::class);
//    }
//    public function technologyCatagory(): \Illuminate\Database\Eloquent\Relations\HasOne
//    {
//        return $this->hasOne(TechnologyCatagory::class);
//    }
    public function bounty(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Bounty::class);
    }
    public function questionNotes(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(QuestionNotes::class);
    }

    public function questionProgrammingLanguages(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        //maybe add functionality to make this  a hasMany relationship since a lot of quwstions have multiple programming languages
        return $this->hasOne(QuestionProgrammingLanguages::class);
    }

    public function questionTechnologyCatagory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(QuestionTechnologyCatagory::class);
    }

}
