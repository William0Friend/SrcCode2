<x-app>
    <div class="container">
        <h1>Edit Your Answer</h1>
        <form method="POST" action="{{ route('answers.update', $answer->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Answer Body</label>
                <textarea class="form-control" name="body">{{ old('body', $answer->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</x-app>
