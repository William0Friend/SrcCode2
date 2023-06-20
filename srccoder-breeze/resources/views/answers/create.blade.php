
<x-app-guest>
    <form action="{{ route('answers.store', ['question' => $question->id]) }}" method="POST">
        @csrf
        <label for="body">Your Answer:</label>
        <textarea id="body" name="body" required></textarea>
    
        <input type="submit" value="Post Answer">
    </form>
    
</x-app-guest>

