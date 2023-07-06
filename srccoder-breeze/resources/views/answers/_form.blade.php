{{--  <form method="POST" action="{{ route('answers.store', ['slug' => $question->slug]) }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Your Answer</label>
        <textarea class="form-control" name="body"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>  --}}
@if(Auth::check() )  

    @if(auth()->user()->id !== $question->user_id)
            <div class="flex items-stretch justify-stretch place-content-around">
                <form id="answerForm" method="POST" action="{{ route('answers.store', ['slug' => $question->slug]) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Your Note</label>
                        <textarea class="form-control" name="note"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Your Code</label>
                        <textarea class="form-control" name="code_body"></textarea>
                    </div>

                    <button title="submit your answer!" type="submit" class="p-2 m-auto text-white bg-blue-700 border border-gray-900 hover:text-red hover:bg-blue-800 hover:border-blue-900">Submit</button>
                </form>
            </div>
        @endif

@else
    <div class="text-center text-gray-600">
        <p>You must be logged in to submit an answer, otherwise form is hidden</p>
    </div>
@endif