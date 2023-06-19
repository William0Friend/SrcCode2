{{--  @extends('layouts.blog')
@section('content')  --}}
{{--  <x-debugbar/>  --}}
<x-app>
    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Answers</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="col-4">
                        <p>Create new Post</p>
                        <a href="/answer/create/post" class="btn btn-primary btn-sm">Add Post</a>
                    </div>
                </div>                
                @forelse($answers as $answer)
                    <ul>
                        <li><a href="./answer/{{ $answer->id }}">{{ ucfirst($answer->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No answers available</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app>
{{--  @endsection  --}}
