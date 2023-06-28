<x-app-layout>
    <div class="container">
        <form method="POST" action="{{ route('post.store') }}">
            @csrf

            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>

            <div class="mb-4">
                <label for="body" class="form-label">Body</label>
                <textarea name="body" class="form-control" id="body"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-app-layout>
