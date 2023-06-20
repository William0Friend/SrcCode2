{{--@extends('layouts.app')--}}
{{--@section('content')--}}
<x-app>
    <div class="container">
{{--  search  --}}
        <form action="{{ route('questions.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search questions..." value="{{ request('search') }}">
        </form>
        @foreach($questions as $question)
            <div class="mb-3 card">
                <div class="card-header">
                    <a href="{{ route('questions.show', $question->slug) }}">{{ $question->title }}</a>
                    @if($question->bounty)
                        <span class="badge bg-success">Bounty: {{ $question->bounty->bounty }}</span>
                    @endif
                </div>
                <div class="card-body">
                    <p>{{ Str::limit($question->body, 100) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app>
