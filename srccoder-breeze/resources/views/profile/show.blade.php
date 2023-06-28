<x-app-guest>
    <div class="container px-4 mx-auto mt-5 mb-20">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- Profile Info -->
            <div class="p-6 bg-white rounded-lg shadow">
                <div class="mb-4 text-lg font-bold">Profile</div>
                <div class="space-y-2">
                    <p><strong class="font-bold">Name:</strong> {{ $user->name }}</p>
                    <p><strong class="font-bold">Email:</strong> {{ $user->email }}</p>
                    <!-- Add more fields as needed -->
                </div>
            </div>
            <div class="flex flex-col justify-between p-6 bg-white rounded-lg shadow">
                <div class="mb-4 text-right">
                    <a href="{{ route('profile.edit', $user->id) }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded btn btn-primary hover:bg-blue-700">Edit Profile</a>
                </div>
                <div class="mb-5 ml-10">
                    {{--  <!-- Display the user's avatar image -->  --}}
                    {{--  @if($user->image)
                        <img src="{{ $user->image->url }}" class="w-48 h-48 rounded-full">
                    @else  --}}
                        {{--  <!-- Display a default avatar image -->  --}}
                        <img src="https://i.pravatar.cc/100?u={{$user->id}}" class="w-48 h-48 border border-black rounded-xl">
                    {{--  @endif  --}}
                </div>
            </div>
            <!-- Questions -->
            <div class="p-6 bg-white rounded-lg shadow">
                <div class="mb-4 text-lg font-bold">Questions</div>
                @forelse($questions as $question)
                    <div class="pb-4 mb-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-blue-500">{{ $question->title }}</h2>
                        <p class="text-gray-600">{{ Str::limit($question->body, 100) }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No questions posted yet.</p>
                @endforelse
            </div>

            <!-- Answers -->
            <div class="p-6 bg-white rounded-lg shadow">
                <div class="mb-4 text-lg font-bold">Answers</div>
                @forelse($answers as $answer)
                    <div class="pb-4 mb-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-blue-500">Answer to: {{ $answer->question->title }}</h2>
                        <p class="text-gray-600">{{ Str::limit($answer->body, 100) }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No answers posted yet.</p>
                @endforelse
            </div>
        </div>
    </div>

</x-app-guest>







