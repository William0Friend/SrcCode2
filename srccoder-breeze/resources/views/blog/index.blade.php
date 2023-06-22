<x-app-guest>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Srccoder-Pedia!</h1>
                        <p>Enjoy reading our wiki's. Click on a post to read! Familiar with Srccder, add your own wiki.</p>
                    </div>
                    <div class="col-4">
                        @if(Auth::User())
                        <p>Create new wiki</p>
                        <a href="/blog/create/post" class="btn btn-primary btn-sm">Add Wiki</a>
                        @else
                        <p>Must be logged in to edit wikis!</p>
                        <a href="/login" class="btn btn-primary btn-sm">Login to add Wiki</a>
                        <p>Not a member?</p>    
                        <a href="/register" class="btn btn-primary btn-sm">Register</a>
                @endif
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
</x-app-guest>
