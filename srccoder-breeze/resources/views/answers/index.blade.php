{{--@extends('layouts.app')--}}
{{--@section('content')--}}
<x-srccoder>
    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Answer!</h1>
                        <p>Enjoy reading our questions? Click on a question to answer!</p>
                    </div>
                    <div class="col-4">
                        <p>Create new Answer</p>
                        <a href="/" class="btn btn-primary btn-sm">Add Answer</a>
                    </div>
                </div>
                @forelse($posts as $post)
                    <ul>
                        <li><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
            </div>
        </div>
    </div>
</x-srccoder>
