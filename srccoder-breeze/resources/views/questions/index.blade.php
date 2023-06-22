<x-app-guest>
    <div class="container px-4 mx-auto ">
{{--  search  --}}
        <form action="{{ route('questions.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" class="p-3 mt-5 bg-gray-200 border-0 rounded-md shadow-sm form-control focus:bg-white focus:outline-none" placeholder="Search questions..." value="{{ request('search') }}">
        </form>
        @foreach($questions as $question)
            <div class="mb-6 bg-white rounded-md shadow-md">
                <div class="flex items-center justify-between px-4 py-2">
                    <a href="{{ route('questions.show', $question->slug) }}" class="text-lg font-semibold text-blue-500">{{ $question->title }}</a>
                    @if($question->bounty)
                        <span class="px-2 py-1 text-sm text-white bg-green-500 rounded-md badge">{{ $question->bounty->bounty }}</span>
                    @endif
                </div>
                <div class="px-4 py-2">
                    <p class="text-gray-600">{{ Str::limit($question->body, 100) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-guest>
