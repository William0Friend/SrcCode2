@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="pt-5 text-center col-12">
                <h1 class="mt-5 display-one">{{ config('app.name') }}</h1>
                <p>This awesome blog has many articles, click the button below to see them</p>
                <br>
                <a href="/blog" class="btn btn-outline-primary">Show Blog</a>
            </div>
        </div>
    </div>
@endsection
