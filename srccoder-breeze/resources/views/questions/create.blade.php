
<x-app-guest>
    <div class="flex items-stretch justify-center w-auto h-auto my-10">
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            <div class="border border-separate border-spacing-1 ring-2">
            <label for="title">Question Title:</label>
            <br />
            <input type="text" id="title" name="title" required>
            </div>
            <br />
            <div>
            <label for="body">Question Body:</label>
            <br />
            <textarea id="body" name="body" required></textarea>
            </div>
            <br />
            <div>
            <label for="bounty">Bounty:</label>
            <br />
            <input type="number" id="bounty" name="bounty" min="0" required>
            </div>
            <br />
            <input type="submit" value="Ask Question" class="btn-dark">
        </form>
    </div>
</x-app-guest>

