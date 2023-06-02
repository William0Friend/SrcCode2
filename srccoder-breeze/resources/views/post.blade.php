
{{-- components directory layout.blade.php way --}}
<x-layout>
    <article class="container">
        <h1>{!!$post->title !!}</h1>
        <div class="my-2 row">
            <div class="container text-left border col-md-8 bg-light rounded-3 border-primary shadow-lg-primary">
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </div>
        </div>
        <div class="container row ">
             {!!$post->body!!}
        </div>
    </article>
    <a href='/' >Go Home</a>

</x-layout>

