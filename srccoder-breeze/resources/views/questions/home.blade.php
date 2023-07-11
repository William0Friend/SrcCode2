<x-app-guest>
    <style>
        .btn-primary {
            @apply bg-blue-500 text-white px-4 py-2 rounded;
          }
          .btn-primary:hover {
            @apply bg-blue-700;
          }
          main {
            /*background-image: url('images/Source-code-icon.svg');
            background-size: 100%;
            background-repeat: no-repeat;*/
            
            /*background-image: url('images/Src/2.jpg');*/
            /*background-repeat: no-repeat;*/
            /*background-size: 100%;*/
            /*background-image: url('images/Source-code-icon.svg');*/
            /*background-size: 2%;*/
        }
        #statistics{
            /*background-image: url('images/Source-code-icon.svg');
            background-size: 50%;
            background-position-y: 50%;
            background-position-x: 50%;
            background-repeat: no-repeat;*/
        }
        #recentQuestions{
            background-image: url('images/Source-code-icon.svg');
            background-position-y: 50%;
            background-repeat: no-repeat;
        }
        
    </style>
    {{--  <!--JumboTron-->  --}}
    <section id="mission-statement" class="p-12 mb-8 rounded-lg sm:p-0">
        <div class="container p-4 mx-auto text-black bg-white border shadow-2xl sm:p-0 lg:my-20 sm:w-full">
            <div class="flex flex-col p-10 md:flex-row">
                <div class=" md:w-1/2 lg:w-3/4">
                    <h1 class="text-5xl font-bold text-center">$rcCode Mission Statement</h1>
                    <p class="text-lg">
                        $rcCodes mission is to empower independent business owners, dreamers,
                        non-technical creatives, or anyone who may have problems that need technical expertise to solve,
                        by providing an easy to use platform, to connect with
                        developers, engineers, scientists, and programmers. With $rcCode you can easily purpose your problem,
                        find your expert, hire, and carry your project through to production, inside the same app.
                    </p>
                    <div class="items-center text-center">
                        <button class="w-full my-2 mt-10 font-bold text-center text-white bg-red-500 border border-black sm:p-10 lg:w-1/4 lg:py-10 lg:px-auto lg:rounded-lg hover:bg-red-700" type="button" title="I want to propose a question">Questions</button>
                        {{--  <button class="w-1/4 py-10 pr-10 mx-10 my-4 font-bold text-center text-white bg-green-500 rounded-lg hover:bg-green-700" type="button" title="I want to propose a solution">Answers</button>  --}}
                    </div>
                </div>
                <div class="mx-auto md:p-8 md:w-1/2 lg:w-1/4">
                    <img src="/images/Src/3.jpg" class="border border-red-700 rounded-sm shadow-2xl" alt="Source code icon">
                </div>
            </div>
        </div>
    </section>
    
     {{--  <!-- How It Works Section -->  --}}
<section id="how-it-works" class="my-auto rounded-lg lg:py-8 lg:p-12 sm:p-0 ">
    <div class="container p-10 mx-auto text-black bg-white border shadow-2xl border-spacing-10 sm:p-0">
        <div class="grid grid-cols-1 text-center lg:my-10 md:grid-cols-3">
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 1</h2>
                <div>
                    <h4 class="font-bold">a.</h4>
                    <p class="mb-2">If not a member, register</p>
                    <a href="/register" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700">Register</a>
                </div>
                <div>
                    <h4 class="font-bold">b.</h4>
                    <p class="mb-2">If a member, login</p>
                    <a href="/login" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700">Login</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 2</h2>
                <div>
                    <h4 class="font-bold">a.</h4>
                    <p class="mb-2">Ask a question or propose a project</p>
                    <a href="/question.create" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700">Connect</a>
                </div>
                <div>
                    <h4 class="font-bold">b.</h4>
                    <p class="mb-2">If you are an expert and/or developer, browse our questions</p>
                    <a href="/question.browse" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700">Browse</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 3</h2>
                <p class="mb-2">Work together to bring your project to life.</p>
                <small>Click the about page to learn more about srccode</small>
                <a href="/about" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700">About</a>
                <p class="mt-2">Use our srccoder-pedia, or view our srccoder-news</p>
            </div>
        </div>
    </div>
</section>  
{{-- <!--   
    <section id="how-it-works" class="my-auto rounded-lg lg:py-8 lg:p-12 sm:p-0 ">
    <div class="container p-10 mx-auto text-black bg-white border shadow-2xl border-spacing-10 sm:p-0">
        <div class="flex-col text-center lg:flex md:grid md:grid-cols-3 lg:my-10">
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 1</h2>
                <div>
                    <h4 class="font-bold">a.</h4>
                    <p class="mb-2">If not a member, register</p>
                    <a href="/register" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg md:px-8 md:py-4 hover:bg-red-700">Register</a>
                </div>
                <div>
                    <h4 class="font-bold">b.</h4>
                    <p class="mb-2">If a member, login</p>
                    <a href="/login" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg md:px-8 md:py-4 hover:bg-red-700">Login</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 2</h2>
                <div>
                    <h4 class="font-bold">a.</h4>
                    <p class="mb-2">Ask a question or propose a project</p>
                    <a href="/question.create" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg md:px-8 md:py-4 hover:bg-red-700">Connect</a>
                </div>
                <div>
                    <h4 class="font-bold">b.</h4>
                    <p class="mb-2">If you are an expert and/or developer, browse our questions</p>
                    <a href="/question.browse" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg md:px-8 md:py-4 hover:bg-red-700">Browse</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="text-xl font-semibold">Step 3</h2>
                <p class="mb-2">Work together to bring your project to life.</p>
                <small>Use the about page to learn more about srccode</small>
                <a href="/about" class="px-4 py-2 mx-4 my-2 font-bold text-white bg-red-500 rounded-lg md:px-8 md:py-4 hover:bg-red-700">About</a>
                <p class="mt-2">Use our srccoder-pedia, or view our srccoder-news</p>
            </div>
        </div>
    </div>
</section>  
--> --}}
    
    {{--  <!-- Recent Questions Feed -->  --}}
    <section id="recentQuestions" class="py-12 bg-gray-100 shadow-2xl">
        <div class="items-center px-4 mx-auto max-w-7xl sm:px-6 lg:bg-lg:px-8">
            <h2 class="mb-6 text-2xl font-bold text-center text-red-500 bg-black border lg:px-auto lg:mx-auto ">Recent Questions</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($recentQuestions as $question)
                <div class="flex flex-col col-span-1 text-center bg-white border border-black divide-y rounded-lg shadow-xl order-spacing-10">
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
                        <p class="text-sm font-medium text-red-700">Full Question<span class="sr-only"> about {{ $question->title }}</span></p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--  //TODO: categories and programming languge choices  --}}
    {{--  <!-- Categories / Tags -->  --}}
    {{--  <section class="py-12 bg-light">
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
    </section>  --}}
    {{--  <!-- Statistics -->  --}}
    <section id="statistics" class="py-12">
        <div class="container p-4 mx-auto text-black bg-white border border-black shadow-xl border-spacing-10">
            <h2 class="my-8 text-center border-b-2 border-red-700">Statistics</h2>
            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="p-4 my-4 text-white bg-black border-white rounded-lg shadow-md border-spacing-10">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Users</p>
                </div>
                <div class="p-4 my-4 text-white bg-black border-white rounded-lg shadow-md border-spacing-10">
                    <h3>{{ $totalQuestions }}</h3>
                    <p>Questions</p>
                </div>
                <div class="p-4 my-4 text-white bg-black border-white rounded-lg shadow-md border-spacing-10">
                    <h3>{{ $totalAnswers }}</h3>
                    <p>Answers</p>
                </div>
            </div>
        </div>
    </section>

     {{--  ABUSEIPDB svg  --}}
    <section id="abuseipdb" class="flex py-12">
        <div class="container p-4 mx-auto text-black bg-white border border-black shadow-xl border-spacing-10">
            <h2 class="my-8 text-center border-b-2 border-red-700"> <a class="" href="https://www.abuseipdb.com/=" title="AbuseIPDB is an IP address blacklist for webmasters and sysadmins to report IP addresses engaging in abusive behavior on their networks">
                        AbuseIPDB
                    </a></h2>
            <div class="grid grid-cols-1 gap-4 text-center">
                <p class="p-4 my-4 text-white bg-black border-white rounded-lg shadow-md border-spacing-10">
               Site is monitored by</p> 
                </div>
            <div class="grid p-4 my-4 text-white bg-black border-white rounded-lg shadow-md grid-col-1 border-spacing-10">
            <img class="mx-auto" 
            src="https://www.abuseipdb.com/contributor/119071.svg" 
            alt="AbuseIPDB Contributor Badge" 
            style="width: 316px;
                    border-radius: 5px;
                    border-top: 5px solid #058403;
                    border-right: 5px solid #111;
                    border-bottom: 5px solid #111;
                    border-left: 5px solid #058403;
                    padding: 5px;
                    background: #35c246 linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.3) 50%, rgba(0,0,0,.2) 51%, rgba(0,0,0,0));
                    padding: 5px;
                    box-shadow: 2px 2px 1px 1px rgba(0, 0, 0, .2);" />
                </div>
            </div>
        </div>
    </section>


</x-app-guest>
