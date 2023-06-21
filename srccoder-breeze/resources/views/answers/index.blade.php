<x-app-guest>
    <div class="container">
        <h1>Your Answers</h1>
        @foreach($answers as $answer)
            <div class="mb-4 card">
                <div class="card-header">
                    Answer to: <a href="{{ route('questions.show', $answer->question->slug) }}">{{ $answer->question->title }}</a>
                </div>
                <div class="card-body">
                    <p>{{ $answer->body }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('answers.show', $answer->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('answers.edit', $answer->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        @endforeach
        {{ $answers->links() }} <!-- pagination links -->
    </div>
</x-app-guest>
