{{-- same directory layout.blade.php way --}}
{{-- @extends('layout')
@section('content')
    <article class="container">
        <h1>{{$post->title }}</h1>
        <div class="container ">
             {{$post->body}}
        </div>
    </article>
  <a href='/' >Go Home</a>
@endsection --}}
{{-- components directory layout.blade.php way --}}
<x-layout>
        <article class="container">
            <h1>{{$post->title }}</h1>
            <div class="container ">
                 {!!$post->body!!}
            </div>
        </article>
        <a href='/' >Go Home</a>
</x-layout>