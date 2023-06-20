<a href="{{ route('questions.show', $question->slug) }}" class="btn btn-primary">View</a>
@auth
    <a href="{{ route('questions.show', $question->slug) . '#answer-form' }}" class="btn btn-success">Answer</a>
@else
    <a href="{{ route('login')}}" class="btn btn-dark">Login to Answer</a>
@endauth