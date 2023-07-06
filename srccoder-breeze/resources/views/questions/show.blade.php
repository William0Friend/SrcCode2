<x-app-guest>
    <button class="p-1 m-1 text-white bg-blue-900 border rounded border-blue-950" onclick="window.history.back()">Go Back</button>
    <div class="container px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold leading-9 text-center text-gray-900">Question Details</h1>
        <div class="mt-6 overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center space-x-3">
                    <img src="https://i.pravatar.cc/100?u={{$question->user->id}}" alt="" class="w-10 h-10 rounded-full">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{$question->user->name}}</h3>
                        @if($question->bounty)
                            <p class="max-w-2xl mt-1 text-sm text-green-500">Bounty: {{ $question->bounty->bounty }}</p>
                        @endif
                        <p class="max-w-2xl mt-1 text-sm text-gray-500">
                            Posted <time>{{$question->created_at->diffForHumans()}}</time>
                        </p>
                    </div>
                </div>
                <div class="max-w-xl mx-auto mt-2 text-xl text-gray-500">
                    <p class="">{{ $question->body }}</p>
                </div>
            </div>
        </div>
@if(Auth::check())
        @if((auth()->user()->id === $question->user_id) and $question->answers->count() > 0)
        <div class="my-5 text-center">
            <h3 class="inline-block px-2 py-1 my-1 text-2xl font-extrabold text-white bg-gray-700 border border-red-700 rounded">Your Answers Are Below</h3>
        </div>    
        @endif

@else
    <a class="p-1 m-1 text-white bg-blue-900 border rounded border-blue-950 sm:mx-auto sm:justify-center sm:items-center" href="/login">Sign in to see more!</a>
@endif


{{--  Answer part  --}}
        <div class="mt-6 space-y-6">
            @forelse($question->answers as $answer)
                <article class="overflow-hidden bg-white shadow sm:rounded-lg">
                    
                        {{-- upvote --}}
                        @if (auth()->user()->id !== $answer->user_id)
                        {{--  upvote button on the right  --}}
                        <div class="flex w-auto h-auto mx-auto text-xl font-bold text-white bg-gray-800 hover:rounded justify-left items-left hover:bg-red-700">
                            {{--  <button type="button" id="upvote-button" onclick="upvote()" onclick="location.href='{{ route('answers.upvote', $answer) }}'">Upvote</button>      --}}
                            {{--  <button type="button" id="upvote-button" onclick="upvote(this)" data-url="{{ route('answers.upvote', $answer) }}">Upvote</button>      --}}
                            <button type="button" class="upvote-button" onclick="upvote(this)" data-url="{{ route('answers.upvote', $answer) }}" data-answer-id="{{ $answer->id }}">Upvote</button>

                        </div>
                        @endif
                        {{--  mark best answer by user  --}}
                        @if (auth()->user()->id == $question->user_id)
                        {{--  on next row, in div, right under upvote  --}}
                        <div class="flex items-center justify-center w-auto h-auto mx-auto text-xl font-bold text-white bg-gray-800 hover:rounded hover:bg-blue-700">
                            <button type="button" onclick="location.href='{{ route('questions.best-answer', [$question, $answer]) }}'">Award Bounty(Mark as Best)</button>
                        </div>
                        @endif
                        {{--  display upvote count on the left  --}}
                        @php
                            $upvoteCount = $answer->upvotes;
                        @endphp
                        {{--  <!-- upvote button -->  --}}
                        {{--  <button type="button" id="upvote-button" onclick="upvote()">Upvote</button>  --}}

                        {{--  <!-- upvote count -->  --}}
                        {{--  <div id="upvote-count">{{ $upvoteCount }} Upvotes</div>  --}}
                        <div data-answer-id="{{ $answer->id }}" class="upvote-count">{{ $upvoteCount }} Upvotes</div>
                        
                        <script>
                            function upvote(button) {
                                var upvoteUrl = $(button).data('url');
                                var answerId = $(button).data('answer-id');
                                
                                $.ajax({
                                    url: upvoteUrl,
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        // Update upvote count on page
                                        $('div[ data-answer-id="' + answerId + '"]').text(data.upvotes + " Upvotes").addClass('text-red-700');
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        if (jqXHR.status == 403) {
                                            alert(jqXHR.responseJSON.message);
                                        } else {
                                            console.log('Error occurred during upvote.');
                                        }
                                    }
                                });
                            }
                        </script>
                        
                        {{--  <div class="flex items-center justify-center w-auto h-auto mx-auto text-xl font-bold text-white bg-gray-800 hover:rounded hover:text-black hover:bg-yellow-400">
                            {{ $upvoteCount }} Upvotes
                        </div>  --}}
                        
                       
                    <div class="px-4 py-5 sm:px-6">
                        <div class="flex items-center space-x-3">
                            <img src="https://i.pravatar.cc/100?u={{$answer->user->id}}" alt="" class="w-10 h-10 rounded-full">
                            <div>
                                <h3 class="text-lg font-medium leading-6 text-gray-900">{{$answer->user->name}}</h3>
                                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                                    Posted <time>{{$answer->created_at->diffForHumans()}}</time>
                                </p>
                            </div>
                        </div>
                        <div class="items-center justify-center max-w-xl mx-auto mt-2 text-lg text-gray-500">
                            <h3>Answer Note:</h3>
                            <p class="mb-4 text-green-300 bg-gray-800 rounded p-auto">{{ $answer->note }}</p> 
                              <h3>Answer Body:</h3>
                            <div class="p-2 bg-gray-800">
                                <pre><code class="leading-3 text-white rounded p-auto">{{ $answer->code_body }}</code></pre>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="text-center">
                    <p class="text-gray-600">
                    @if(Auth::check())
                        @if(auth()->user()->id === $question->user_id and $question->answers->count() == 0)
                            <a href="/register" class="text-indigo-600 hover:text-indigo-500">Users will answer your question soon!</a>
                        @endif
                        @if(auth()->user()->id !== $question->user_id and $question->answers->count() == 0)
                            <a href="/register" class="text-indigo-600 hover:text-indigo-500">Be the first to answer this question!</a>
                        @endif
                   @else
                        <a href="/register" >Create an account to see more, and do more.</a>
                    @endif
                    </p>
                </div>
            @endforelse
        </div>

        @if(auth()->check())
   
            <div class="my-5 text-center">
                @if(auth()->user()->id == $question->user_id and $question->answers->count() > 0)
                     <h3 class="inline-block px-2 py-1 my-1 text-2xl font-extrabold text-white bg-gray-700 border border-red-700 rounded">Your Answers Are Above</h3>
                @endif
                @if(!auth()->user()->id == $question->user_id)
                    <h3 class="inline-block px-2 py-1 text-2xl font-extrabold text-white bg-gray-700 border border-red-700 rounded">Submit an Answer</h3>
                @endif
          </div>
          @endif
            @include('answers._form')
        
        @if(!Auth::check())
            <div class="text-center text-gray-600">
                <p>You must be logged in to submit an answer.</p>
            </div>
        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(function() {
            $('article').hover(function() {
                $(this).addClass('shadow-xl transform transition duration-500 ease-in-out scale-105');
            }, function() {
                $(this).removeClass('shadow-xl transform transition duration-500 ease-in-out scale-105');
            });
        });
    </script>
    
</x-app-guest>
