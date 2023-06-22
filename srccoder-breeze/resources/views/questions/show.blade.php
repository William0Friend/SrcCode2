<x-app-guest>
    <button class="rounded-full" onclick="window.history.back()">Go Back</button>
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

        <div class="mt-6 space-y-6">
            @forelse($question->answers as $answer)
                <article class="overflow-hidden bg-white shadow sm:rounded-lg">
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
                        <div class="max-w-xl mt-2 text-lg text-gray-500">
                            <h4 class="mb-4">{{ $answer->note }}</h4> 
                            <pre><code class="p-4 mt-5 text-white bg-gray-800 rounded">{{ $answer->code_body }}</code></pre>
                        </div>
                    </div>
                </article>
            @empty
                <div class="text-center">
                    <p class="text-gray-600">
                        <a href="#answerForm" class="text-indigo-600 hover:text-indigo-500">Be the first to answer this question!</a>
                    </p>
                </div>
            @endforelse
        </div>

        @if(auth()->check())
            <div class="my-5 text-center">
                <h3 class="inline-block px-2 py-1 text-2xl font-extrabold text-white bg-black rounded-full">Submit an Answer</h3>
            </div>
            @include('answers._form')
        @else
            <div class="text-center text-gray-600">
                <p>You must be logged in to submit an answer.</p>
            </div>
        @endif
    </div>
</x-app-guest>

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
