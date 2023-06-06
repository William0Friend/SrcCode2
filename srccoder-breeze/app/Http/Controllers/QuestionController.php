<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Models\Question;
class QuestionController extends Controller
{
//
//    public function index()
//    {
//        // show all blog posts
//    }
//
//    public function create()
//    {
//        //show form to create a question post
//    }
//
//
//    public function store(Request $request)
//    {
//        //store a new question post
//    }
//
//    public function show(Question $question)
//    {
//        //show a question post
//    }
//
//
//    public function edit(Question $question)
//    {
//        //show form to edit the post
//    }
//
//
//    public function update(Request $request, Question $question)
//    {
//        //save the edited post
//    }
//
//
//    public function destroy(Question $question)
//    {
//        //delete a post
//    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // fetch and return all blog posts
        $questions = Questions::all(); //fetch all blog posts from DB
        //raw json
        //return $posts; //returns the fetched posts
        return view('srccode.index', [
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
}
