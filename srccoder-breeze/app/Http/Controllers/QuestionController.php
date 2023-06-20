<?php
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Bounty;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // fetch and return all blog posts
    //     $questions = Question::all(); //fetch all blog posts from DB
    //     //raw json
    //     //return $posts; //returns the fetched posts
    //     return view('question.index', [
    //         'questions' => $questions,
    //     ]); //returns the view with posts
    // }
    public function index(Request $request)
    {
        // $questions = Question::with('bounty')->get();
        // return view('questions.index', compact('questions'));
        $query = Question::query()->with('bounty');

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('body', 'like', '%' . $request->search . '%');
        }
    
        $questions = $query->get();
    
        return view('questions.index', compact('questions'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('question.create');
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'title' => 'required|max:255',
             'body' => 'required',
             'bounty' => 'nullable|integer|min:0',
         ]);
     
         // Save the question
         $question = new Question();
         $question->title = $validatedData['title'];
         $question->body = $validatedData['body'];
         $question->user_id = auth()->user()->id; 
        //  $question->save();
     
         // Generate a slug from the title and id
         $question->slug = Str::slug($validatedData['title']) . '-' . $question->id;
         $question->save();
     
         // If a bounty was set, save it
         if ($validatedData['bounty']) {
             $bounty = new Bounty();
             $bounty->question_id = $question->id;
             $bounty->bounty = $validatedData['bounty'];
             $bounty->save();
         }
     
         return redirect()->route('questions.show', [$question->slug], );
     }

    /**
     * Display the specified resource.
     */
    // public function show(Question $question)
    // {
    //     //
    //     //return $blogPost; //returns the fetched posts
    //     return view('question.show', [
    //         'question' => $question,
    //     ]); //returns the view with the post
    // }
    public function show($slug)
    {
        $question = Question::with('bounty')->where('slug', $slug)->firstOrFail();
        return view('questions.show', compact('question'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Question $question)
    // {
    //     //
    //     return view('question.edit', [
    //         'question' => $question,
    //     ]); //returns the edit view with the post
    // }
    public function edit($slug)
    {
        $question = Question::where('slug', $slug)->firstOrFail();
        return view('questions.edit', compact('question'));
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

    public function browse()
    {
        $questions = Question::with('bounty')->paginate(10);
        return view('questions.browse', compact('questions'));
    }

    public function 
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
