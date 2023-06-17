<?php
namespace App\Http\Controllers;


use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // fetch and return all blog posts
        $questions = Question::all(); //fetch all blog posts from DB
        //raw json
        //return $posts; //returns the fetched posts
        return view('question.index', [
            'questions' => $questions,
        ]); //returns the view with posts
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$table->id();
        //$table->foreignId('user_id'); // user_id of our question
        //$table->text('title');  // Title of our question
        //$table->longText('body');   // Body of our question
        //$table->foreignId('bounty_id');
        //$table->foreignId('programming_language_id');
        //$table->foreignId('technology_category_id');
        //$table->string('slug')->unique();//slug is a url friendly version of the title
        //$table->boolean('is_answered')->default(false);
        //$table->timestamps();

        $newQuestion = Question::create([
            'title' => $request->title,
            'body' => $request->body
            //need to set these to null for now
            //TODO: fix this
//            'user_id' => $request->user_id,
//            'bounty_id' => $request->bounty_id,
//            'programming_language_id' => $request->programming_language_id,
//            'technology_category_id' => $request->technology_category_id,
//            'slug' => $request->slug,
//            'is_answered' => $request->is_answered
        ]);

        return redirect('question/' . $newQuestion->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
        //return $blogPost; //returns the fetched posts
        return view('question.show', [
            'question' => $question,
        ]); //returns the view with the post
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
        return view('question.edit', [
            'question' => $question,
        ]); //returns the edit view with the post
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
        $question->update([
            'title' => $request->title,
            'body' => $request->body,
//            'user_id' => $request->user_id,
//            'bounty_id' => $request->bounty_id,
//            'programming_language_id' => $request->programming_language_id,
//            'technology_category_id' => $request->technology_category_id,
//            'slug' => $request->slug,
//            'is_answered' => $request->is_answered
        ]);

        return redirect('question/' . $question->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
        $question->delete();

        return redirect('/question');
    }
}
