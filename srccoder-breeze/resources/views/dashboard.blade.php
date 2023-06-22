<x-app-guest>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full px-4 sm:w-1/2 md:w-1/3">
                {{-- User info --}}
                <div class="p-4 mb-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <h3 class="mb-2 text-lg font-semibold">User Info</h3>
                    <img class="w-16 h-16 mb-2 rounded-full" src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}" alt="User Image">
                    <p class="mb-1"><span class="font-semibold">Name:</span> {{ auth()->user()->name }}</p>
                    <p class="mb-1"><span class="font-semibold">Email:</span> {{ auth()->user()->email }}</p>
                </div>
            </div>

            <div class="w-full px-4 sm:w-1/2 md:w-2/3">
                {{-- User's questions --}}
                <div class="p-4 mb-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <h3 class="mb-2 text-lg font-semibold">Your Questions</h3>
                    @foreach(auth()->user()->questions as $question)
                        <div class="mb-2">
                            <a class="font-semibold text-blue-500 hover:underline" href="{{ route('questions.show', $question->slug) }}">{{ $question->title }}</a>
                            <p class="text-sm">{{ Str::limit($question->body, 100) }}</p>
                        </div>
                    @endforeach
                </div>

                {{-- User's answers --}}
                <div class="p-4 mb-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <h3 class="mb-2 text-lg font-semibold">Your Answers</h3>
                    @foreach(auth()->user()->answers as $answer)
                        <div class="mb-2">
                            <a class="font-semibold text-blue-500 hover:underline" href="{{ route('answers.show', $answer->id) }}">{{ Str::limit($answer->body, 100) }}</a>
                            <p class="text-sm">Question: <a class="font-semibold text-blue-500 hover:underline" href="{{ route('questions.show', $answer->question->slug) }}">{{ $answer->question->title }}</a></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-guest>
