<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
//        dd(Answers::all());
        // fetch and return all blog posts
        $answers = Answer::all(); //fetch all blog posts from DB
        //raw json
        //return $posts; //returns the fetched posts
        return view('answer.index', [
            'answers' => $answers,
        ]); //returns the view with posts
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     // return view('answer.create');
    // }
    public function create(Question $question)
    {
        return view('answers.create', compact('question'));
    }
    /**
     * Store a newly created resource in storage.
*/
    public function store(Request $request, $slug)
    {
        $validatedData = $request->validate([
            'note' => 'required',
            'code_body' => 'required',
        ]);

        $question = Question::where('slug', $slug)->firstOrFail();

        $answer = new Answer();
        $answer->note = $validatedData['note'];
        $answer->code_body = $validatedData['code_body'];
        $answer->user_id = auth()->user()->id;
        $answer->question_id = $question->id;
        
        // Generate a slug for the answer
        $answer->slug = 'answer-' . $answer->user_id . '-' . $answer->question_id . '-' . time();
        
        $answer->save();

        return redirect()->route('questions.show', [$question->slug]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
        //return $blogPost; //returns the fetched posts
        return view('answer.show', [
            'answer' => $answer
        ]); //returns the view with the post
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
        return view('answer.edit', [
            'answer' => $answer
        ]); //returns the edit view with the post
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
        $answer->update([
            'note' => $request->note,
            'code_body' => $request->code_body,
//            'user_id' => $request->user_id,
//            'question_id' => $request->question_id
        ]);

        return redirect('answers/' . $answer->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
        $answer->delete();

        return redirect('/answer');
    }
}

