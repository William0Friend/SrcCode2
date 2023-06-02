

<x-layout>
    @foreach ($posts as $post)
    <article class="container p-4 m-4 border-separate shadow-lg row col-8 col-12 bg-dark rounded-3 border-bottom border-spacing-1 border-danger ">
        
        <a href="/posts/{{$post->slug}}">
                <h1 class="container text-center col-md-6 fw-bold text-danger" >{{$post->title}}</h1>
        </a>
        <div class="my-2 row">
                    <div class="container text-left border col-md-8 bg-light rounded-3 border-primary shadow-lg-primary">
                    <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                    </div>
            </div>
        <div class="row">
                    <div class="container text-left border col-md-5 bg-light rounded-3 border-primary shadow-lg-primary">
                        {!!$post->excerpt!!}
        </div>
                    <div class="container text-left border col-md-5 bg-light rounded-3 border-primary shadow-lg-primary">
                        {!!$post->body!!}
                    </div>
        </div>
    </article>
    @endforeach
     
</x-layout>