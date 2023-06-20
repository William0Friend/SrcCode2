{{--@extends('layouts.app')--}}
{{--@section('content')--}}
@props(['answer']);
<x-srccoder>
    <x-app>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Answer by: {{ $answer->user->name }}</h2>
                    <p>Email: {{ $answer->user->email }}</p>
                    <img src="https://www.pravatar.cc/150?u={{ $answer->user->email }}" alt="{{ $answer->user->name }}'s avatar">
                    <h3>Answer to: {{ $answer->question->title }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ $answer->body }}</p>
                </div>
            </div>
        </div>
    </x-app>
</x-srccoder>
{{--@endsection--}}
