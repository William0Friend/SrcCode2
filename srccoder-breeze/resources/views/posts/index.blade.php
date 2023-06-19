

    {{-- @foreach ($posts as $post)
    <article class="container p-4 m-4 border-separate shadow-lg row col-8 col-12 bg-dark rounded-3 border-bottom border-spacing-1 border-danger ">
        
        <a href="/posts/{{$post->slug}}">
                <h1 class="container text-center col-md-6 fw-bold text-danger" >{{$post->title}}</h1>
        </a>
        <div class="my-2 row">
            <!-- n+1  problem without route fix when using P--> 
                    <div class="container text-center border col-md-10 bg-light rounded-3 border-primary shadow-lg-primary">
                        <p class="text-danger">
                            By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                        </p>
                    </div>
            </div>
        <div class="row">
                    <div class="container text-left border col-md-5 bg-light rounded-3 border-primary shadow-lg-primary">
                       Excerpt: {!!$post->excerpt!!}
        </div>
                    <div class="container text-left border col-md-5 bg-light rounded-3 border-primary shadow-lg-primary">
                       Body: {!!$post->body!!}
                    </div>
        </div>
    </article>
    @endforeach --}}

<x-app-guest>  
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 space-y-6 lg:mt-20">
        {{-- grab from post collection --}}
        {{-- moved if and loop to posts-grid.blade.php to condence this --}}
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
            {{-- render page numbers after ->pageination(6) in PostController --}}
            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif
    
    </main>
</x-app-g>