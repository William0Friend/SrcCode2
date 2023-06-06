<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function index()
    {
//        dd(Answers::all());
        // fetch and return all blog posts
        $answers = Answers::all(); //fetch all blog posts from DB
        //raw json
        //return $posts; //returns the fetched posts
        return view('answers.index', [
            'answer' => $answers,
        ]); //returns the view with posts
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('answers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        //
//        $table->id();
//        $table->foreignId('user_id');
//        $table->foreignId('question_id');
//        $table->text('note');
//        $table->longText('code_body');
//        $table->string('slug')->unique();//slug is a url friendly version of the title
//        $table->timestamps();
        $newAnswer = Answers::create([
            'note' => $request->note,
            'code_body' => $request->code_body,
            'user_id' => $request->user_id,
            'question_id' => $request->question_id
        ]);

        return redirect('answers/' . $newAnswer->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Answers $answer)
    {
        //
        //return $blogPost; //returns the fetched posts
        return view('answer.show', [
            'post' => $answer,
        ]); //returns the view with the post
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
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
