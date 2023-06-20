{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<x-app-guest>
    <div class="container">
        <form method="POST" action="{{ route('questions.update', $question->slug) }}">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $question->title }}">
            </div>
    
            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea class="form-control" name="body">{{ $question->body }}</textarea>
            </div>
    
            @if($question->bounty)
                <div class="mb-3">
                    <label class="form-label">Bounty</label>
                    <input type="number" class="form-control" name="bounty" value="{{ $question->bounty->bounty }}">
                </div>
            @endif
    
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-guest>
{{--@endsection--}}
