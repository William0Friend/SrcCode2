
<x-app-guest>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <label for="title">Question Title:</label>
        <input type="text" id="title" name="title" required>
    
        <label for="body">Question Body:</label>
        <textarea id="body" name="body" required></textarea>
    
        <label for="bounty">Bounty:</label>
        <input type="number" id="bounty" name="bounty" min="0" required>
    
        <input type="submit" value="Ask Question">
    </form>
</x-app-guest>

