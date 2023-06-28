<x-app-layout>
    <div class="container">
        <form method="POST" action="{{ route('post.update', $post) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
            </div>

            <div class="mb-4">
                <label for="body" class="form-label">Body</label>
                <textarea name="body" class="form-control" id="body">{{ $post->body }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>
