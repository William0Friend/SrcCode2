
{{-- components directory layout.blade.php way --}}
<x-layout>
    <article class="container p-4 m-4 text-white border-separate shadow-lg row col-8 col-12 bg-dark rounded-3 border-bottom border-spacing-1 border-danger">
        <h1>Post id #: {!! $post->id !!}</h1>
        <h1>Post slug: {!! $post->slug !!}</h1>
        <div class="my-2 row">
            <div class="container text-left border col-md-8 bg-light rounded-3 border-primary shadow-lg-primary">
                <p class="text-danger">
                    By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                </p>
            </div>
        </div>
        <div class="container row ">
            <h4 class="fw-bold text-danger" >Title:</h4>
            <h1 class="text-center fw-bold text-danger" >{{$post->title}}</h1>
        </div>

        <div class="container row ">
            <h4 class="fw-bold text-danger" ><br />Body:</h4>
             <div class="text-center"> {!!$post->body!!} </div
        </div>
    </article>
    <a class="text-white btn btn-outline-dark btn-danger fw-bold" href='/' >Go Home</a>

</x-layout>

