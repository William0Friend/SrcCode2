<x-app-guest>
    <style>
        .btn-primary {
            @apply bg-blue-500 text-white px-4 py-2 rounded;
          }
          .btn-primary:hover {
            @apply bg-blue-700;
          }
    </style>
    {{--  <!--JumboTron-->  --}}
    <section id="mission-statement" class="p-12 mb-8 rounded-lg bg-light">
        <div class="container mx-auto">
            <div class="flex items-center">
                <div class="w-1/2">
                    <h1 class="text-5xl font-bold">$rcCode Mission Statement</h1>
                    <p class="text-lg">
                        $rcCodes mission is to empower independant business owners, dreamers,
                        non-technical creatives, or anyone who may have problems that need techincal expertice to solve,
                        by providing an easy to use platform, to connect with
                        developers, engineers, scientists, and programmers. With $rcCode you can easily purpose your problem,
                        find your expert, hire, and carry your project through to production, inside the same app.
                    </p>
                    <button class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700" type="button" title="I want to propose a question">Questions</button>
                    <button class="px-4 py-2 mx-4 my-4 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700" type="button" title="I want to propose a solution">Answers</button>
                </div>
                <div class="w-1/2">
                    <img src="/images/Source-code-icon.svg" class="rounded-full" alt="Source code icon">
                </div>
            </div>
        </div>
    </section>
    {{--  <!-- How It Works Section -->  --}}
<section id="how-it-works" class="px-12 py-8 mb-8 bg-gray-100 rounded-lg">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-6 text-center md:grid-cols-3">
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 1</h2>
                <div>
                    <h4 class="font-bold">a.</h4>
                    <p class="mb-2">If not a member, register</p>
                    <a href="/register" class="btn-primary">Register</a>
                </div>
                <div>
                    <h4 class="font-bold">b.</h4>
                    <p class="mb-2">If a member, login</p>
                    <a href="/login" class="btn-primary">Login</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 2</h2>
                <div>
                    <h4 class="font-bold">a.</h4>
                    <p class="mb-2">Ask a question or propose a project</p>
                    <a href="/question.create" class="btn-primary">Connect</a>
                </div>
                <div>
                    <h4 class="font-bold">b.</h4>
                    <p class="mb-2">If you are an expert and/or developer, browse our questions</p>
                    <a href="/question.browse" class="btn-primary">Browse</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 3</h2>
                <p class="mb-2">Work together to bring your project to life.</p>
                <small>Use the about page to learn more about srccode</small>
                <a href="/about" class="mt-2 btn-primary">About</a>
                <p class="mt-2">Use our srccoder-pedia, or view our srccoder-news</p>
            </div>
        </div>
    </div>
</section>

    {{--  <!-- Recent Questions Feed -->  --}}
    <section class="py-12 bg-gray-100">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="mb-6 text-2xl font-bold text-gray-900">Recent Questions</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($recentQuestions as $question)
                <div class="flex flex-col col-span-1 text-center bg-white divide-y divide-gray-200 rounded-lg shadow">
                    <div class="flex flex-col flex-1 p-8">
                        <h3 class="mt-6 text-sm font-medium text-gray-900">{{ $question->title }}</h3>
                        <dl class="flex flex-col justify-between flex-grow mt-1">
                            <dt class="sr-only">Publish time</dt>
                            <dd class="text-sm text-gray-500">{{ $question->created_at->diffForHumans() }}</dd>
                            <dt class="sr-only">Description</dt>
                            <dd class="mt-3 text-sm text-gray-500">{{ Str::limit($question->body, 100) }}</dd>
                        </dl>
                    </div>
                    <div>
                        <a href="{{ route('questions.show', $question->slug) }}" class="relative p-6 focus:outline-none">                       
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        <p class="text-sm font-medium text-indigo-600">Read More<span class="sr-only"> about {{ $question->title }}</span></p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{--  <!-- Categories / Tags -->  --}}
    <section class="py-12 bg-light">
        <div class="container mx-auto">
            <h2 class="mb-6">Categories / Tags</h2>
            <div class="grid grid-cols-3 gap-4">
                <!-- Replace with a loop to render categories / tags dynamically -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category / Tag Name</h5>
                        <p class="card-text">Some description about the category or tag...</p>
                    </div>
                </div>
                <!-- End of loop -->
            </div>
        </div>
    </section>
    {{--  <!-- Statistics -->  --}}
    <section class="py-12">
        <div class="container mx-auto">
            <h2 class="my-8 text-center border-b-2 border-green-600">Statistics</h2>
            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="p-4 my-4 bg-white rounded-lg shadow-md">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Users</p>
                </div>
                <div class="p-4 my-4 bg-white rounded-lg shadow-md">
                    <h3>{{ $totalQuestions }}</h3>
                    <p>Questions</p>
                </div>
                <div class="p-4 my-4 bg-white rounded-lg shadow-md">
                    <h3>{{ $totalAnswers }}</h3>
                    <p>Answers</p>
                </div>
            </div>
        </div>
    </section>
</x-app-guest>
