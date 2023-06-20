@props(['question']);
<x-app>
    {{--  <h1 class="text-center">Question Details</h1>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ $question->title }}</h2>
                @if($question->bounty)
                    <p class="text-success">Bounty: {{ $question->bounty->bounty }}</p>
                @endif
            </div>
            <div class="card-body">
                <p>{{ $question->body }}</p>
            </div>
        </div>  --}}
    
        <h1 class="text-center">Question Details</h1>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Question Title: {{ $question->title }}</h2>
                    <article class="flex justify-left items-left">
                    <div>
                        <header>
                            <img src="https://i.pravatar.cc/100?u={{$question->user->id}}" alt="" class="rounded-full">
                            <h3 class="font-bold">{{$question->user->name}}</h3>
                                @if($question->bounty)
                                    <p class="text-success">Bounty: {{ $question->bounty->bounty }}</p>
                                @endif
                            <p class="text-xs">
                                Posted 
                                <time>{{$question->created_at->diffForHumans()}}
                                    </time>
                                </p>
                        </header>
                    </div>
                        <div class="mb-2 card">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4>Question Body: </h4>
                                    <p>{{ $question->body }}</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </article>
                </div>
        {{--   Display the answers here   --}}
        {{--  <div class="mt-4">
            @foreach($question->answers as $answer)
                <div class="mb-2 card">
                    <div class="card-body">
                        <h4>{{ $answer->note }}</h4> 
                        <pre><code class="text-white bg-dark">{{ $answer->code_body }}</code></pre>
                    </div>
                </div>
            @endforeach
        </div>  --}}

        <div class="mt-4">
        
            
        @forelse($question->answers as $answer)
        <article class="flex items-center justify-center">
            <div>
                <img src="https://i.pravatar.cc/100?u={{$answer->user->id}}" alt="" class="rounded-full">
            </div>
        <div>
            <header>
                <h3 class="font-bold">{{$answer->user->name}}</h3>
                <p class="text-xs">
                    Posted 
                    <time>{{$answer->created_at->diffForHumans()}}
                        </time>
                    </p>
            </header>
            
            <div class="mb-2 card">
                <div class="card-body">
                    <h4>{{ $answer->note }}</h4> 
                    <pre><code class="text-white bg-dark">{{ $answer->code_body }}</code></pre>
                </div>
            </div>
            
        </div>
        </article>
        @empty
            <div class="flex items-center justify-center">
                <p>
                    <a href="#answerForm">Be the first to answer this question!</a>
                </p>
            </div>
        @endforelse
        </div>

    </div>
    {{--  after displaying the question and existing answers...   --}}
{{--  show answer form if signed in  --}}
            @if(auth()->check())
            <div class="flex items-center justify-center my-5" >
                <h3 class="text-white bg-black border header-title ring-white">Submit an Answer</h3>
            </div>
            @include('answers._form')
            
        @else
            <p>You must be logged in to submit an answer.</p>
        @endif
</x-app-guest>

