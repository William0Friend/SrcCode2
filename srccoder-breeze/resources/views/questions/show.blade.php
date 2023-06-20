@props(['question']);
<x-app-guest>
    <h1 class="text-center">Question Details</h1>
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
            @foreach($question->answers as $answer)
        <article class="flex">
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
        @endforeach
        </div>

    </div>
    {{--  after displaying the question and existing answers...   --}}
{{--  show answer form if signed in  --}}
            @if(auth()->check())
            <h3>Submit an Answer</h3>
            @include('answers._form')
            
        @else
            <p>You must be logged in to submit an answer.</p>
        @endif
</x-app-guest>

