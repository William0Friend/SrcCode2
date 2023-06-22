{{--  @extends('layouts.blog')
@section('content')  --}}
<x-debugbar/>
<x-app>
    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                <a href="/question" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($question->title) }}</h1>
                <p>{!! $question->body !!}</p> 
                <hr>
                <a href="/question/{{ $question->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Question</button>
                </form>
            </div>
        </div>
    </div>
</x-app>
{{--  @endsection  --}}
