{{--  @extends('layouts.blog')
@section('content')  --}}
<x-debugbar/>
<x-app>
    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Ask a Question!</h1>
                        <p>Enjoy reading our asked questions. Click on a question to read!</p>
                    </div>
                    <div class="col-4">
                        <p>Create new Question</p>
                        <a href="/question/create/post" class="btn btn-primary btn-sm">Add Post</a>
                    </div>
                </div>                
                @forelse($questions as $question)
                    <ul>
                        <li><a href="./question/{{ $question->id }}">{{ ucfirst($question->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No questions available</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app>
{{--  @endsection  --}}
