
<x-app>
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

    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                {{-- User info --}}
                <div class="mb-4">
                    <h3>User Info</h3>
                    <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}" alt="User Image">
                    <p>Name: {{ auth()->user()->name }}</p>
                    <p>Email: {{ auth()->user()->email }}</p>
                </div>

                {{-- User's questions --}}
                <div class="mb-4">
                    <h3>Your Questions</h3>
                    @foreach(auth()->user()->questions as $question)
                        <div>
                            <a href="{{ route('questions.show', $question->slug) }}">{{ $question->title }}</a>
                            <p>{{ Str::limit($question->body, 100) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-xs-6">
                {{-- User's answers --}}
                <div class="mb-4">
                    <h3>Your Answers</h3>
                    @foreach(auth()->user()->answers as $answer)
                        <div>
                            <a href="{{ route('answers.show', $answer->id) }}">{{ Str::limit($answer->body, 100) }}</a>
                            <p>Question: <a href="{{ route('questions.show', $answer->question->slug) }}">{{ $answer->question->title }}</a></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app>
