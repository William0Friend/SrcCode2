<?php
namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Bounty;
use App\Models\Question;
use Illuminate\Http\Request;
use Stripe\Transfer;
use Yajra\DataTables\Facades\DataTables;
// use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Facades\DataTables;
// use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Facades\DataTables;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
;
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
    //store without the stripe
    //  public function store(Request $request)
    //  {
    //      $validatedData = $request->validate([
    //          'title' => 'required|max:255',
    //          'body' => 'required',
    //          'bounty' => 'nullable|integer|min:0',
    //      ]);
     
    //      // Save the question
    //      $question = new Question();
    //      $question->title = $validatedData['title'];
    //      $question->body = $validatedData['body'];
    //      $question->user_id = auth()->user()->id; 
    //     //  $question->save();
     
    //      // Generate a slug from the title and id
    //      $question->slug = Str::slug($validatedData['title']) . '-' . $question->id;
    //      $question->save();
     
    //      // If a bounty was set, save it
    //      if ($validatedData['bounty']) {
    //          $bounty = new Bounty();
    //          $bounty->question_id = $question->id;
    //          $bounty->user_id = auth()->user()->id; 
    //          $bounty->bounty = $validatedData['bounty'];
    //          $bounty->save();
    //      }
     
    //      return redirect()->route('questions.show', [$question->slug], );
    //  }

    //store with stripe
   public function store(Request $request)
     {
         $validated = $request->validate([
             'title' => 'required|max:255',
             'body' => 'required',
             'bounty' => 'nullable|integer|min:0',
         ]);
     
         // Save the question
         $question = new Question();
         $question->title = $validated['title'];
         $question->body = $validated['body'];
         $question->user_id = auth()->user()->id; 
        //  $question->save();
     
         // Generate a slug from the title and id
         $question->slug = Str::slug($validated['title']) . '-' . $question->id;
         $question->save();
     
         // If a bounty was set, save it
         if ($validated['bounty']) {
             $bounty = new Bounty();
             $bounty->question_id = $question->id;
             $bounty->user_id = auth()->user()->id; 
             $bounty->bounty = $validated['bounty'];
             $bounty->save();
         }
    
         // assume that the user has a default payment method setup.
        // TODO: need to handle the case where the user does not have a payment method.
        if ($bounty->bounty >= 0) {
            $user = auth()->user();
    
            try {
                $user->invoiceFor('Question Bounty', $bounty * 100); // Stripe charges in cents
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['Unable to process payment.']);
            }
        }
    
        $question = auth()->user()->questions()->create($validated);  //     $bounty = $validated['bounty'];    
        return redirect()->route('questions.show', [$question->slug], );
     }




    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $question = Question::with('bounty')->where('slug', $slug)->firstOrFail();
        return view('questions.show', compact('question'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
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
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
        $question->delete();

        return redirect('/question');
    }

    // NON REST FUNCTIONS
    public function browse(Request $request)
    {
        $query = Question::with('user', 'bounty');
        return DataTables::of($query)->make(true);
    }
  
        public function browseData(Request $request)
    {
        $questions = Question::with(['bounty', 'user'])->select(['id', 'title', 'slug'])->orderByDesc('created_at');

        return DataTables::of($questions)
            ->addColumn('user.name', function (Question $question) {
                return $question->user ? $question->user->name : 'Unknown';
            })
            ->addColumn('bounty.bounty', function (Question $question) {
                return $question->bounty ? $question->bounty->bounty : 'None';
            })
            ->make(true);
    }
    
    public function home()
    {
        // return view('questions.home', [
            $recentQuestions = Question::latest()->take(12)->get();
            $totalUsers = User::count();
            $totalQuestions = Question::count();
            $totalAnswers = Answer::count();
            return view('questions.home', [
                'recentQuestions' => $recentQuestions,
                'totalUsers' => $totalUsers, 
                'totalQuestions' => $totalQuestions, 
                'totalAnswers' => $totalAnswers
            ]);
        // ]);
    }

    // public function bestAnswer(Question $question, Answer $answer)
    // {
    //     $question->best_answer_id = $answer->id;
    //     $question->save();

    //     return redirect()->back();
    // }
// NOT DONE PAYMENT ATTEMPT
    public function bestAnswer(Question $question, Answer $answer)
    {
        $question->best_answer_id = $answer->id;
        $question->save();

        $transfer = Transfer::create([
        'amount' => $question->bounty->amount * 100,
        'currency' => 'usd',
        'destination' => $answer->user->stripe_account_id,
        'transfer_group' => 'YOUR_TRANSFER_GROUP',
        ]);

        return redirect()->back();
    }

    public function award(Request $request, Question $question)
{
    $this->authorize('update', $question);

    // Get the selected answer
    $answer = Answer::findOrFail($request->input('answer_id'));

    // Update the best answer id
    $question->best_answer_id = $answer->id;
    $question->save();

    // Charge the user
    return redirect()->route('charge', [
        'amount' => $question->bounty,
        'description' => 'Bounty for question id:' . $question->id,
    ]);
}
public function awardBounty(Question $question, Answer $answer)
{
    if (auth()->id() !== $question->user_id) {
        abort(403);
    }

    if (!$question->bounty) {
        return redirect()->back()->withErrors(['No bounty to award.']);
    }

    if ($answer->is_best) {
        return redirect()->back()->withErrors(['Bounty already awarded for this question.']);
    }

    // transfer bounty to the user who provided the best answer
    $payout = $answer->user->payout($question->bounty * 100); // Stripe works with cents

    // Mark the answer as the best answer
    $answer->is_best = true;
    $answer->save();

    // Remove bounty from question
    $question->bounty = null;
    $question->save();

    return redirect()->route('questions.show', $question)->with('success', 'Bounty awarded.');
}



    }
