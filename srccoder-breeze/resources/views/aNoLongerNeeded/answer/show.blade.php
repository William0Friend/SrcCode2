{{--  @extends('layouts.blog')  --}}
{{--  @section('content')  --}}
{{--  <x-debugbar/>  --}}
<x-app>
    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                <a href="/answer" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($answer->title) }}</h1>
                <p>{!! $answer->body !!}</p> 
                <hr>
                <a href="/answer/{{ $answer->id }}/edit" class="btn btn-outline-primary">Edit Answer</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
</x-app>
{{--  @endsection  --}}
