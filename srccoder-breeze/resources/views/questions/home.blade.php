
    <x-app-guest>
        {{--  <!--JumboTron-->  --}}
        <section id="mission-statement" class="p-5 mb-4 bg-light rounded-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold">$rcCode Mission Statement</h1>
                        <p class="col-md-12 fs-4">
                            $rcCodes mission is to empower independant business owners, dreamers,
                            non-technical creatives, or anyone who may have problems that need techincal expertice to solve,
                            by providing an easy to use platform, to connect with
                            developers, engineers, scientists, and programmers. With $rcCode you can easily purpose your problem,
                            find your expert, hire, and carry your project through to production, inside the same app.
                            {{--  <div class="flex w-10 h-10 img-thumbnail">
                                <img src="/images/Source-code-icon.svg" class="" alt="image desc">
                            </div>
                        
                        <ul>
                                <li>All payments handled through stripe, square, or crypto.</li>
                                <li> All code hosted through github.</li>
                                <li> Both Public and Anonymous problem and solutions transactions are avalible.</li>
                            </ul>  --}}
                        </p>
                        <button class="mx-10 my-5 btn btn-danger btn-lg" type="button" title="I want to propose a question">Questions</button>
                        <button class="mx-10 my-10 btn btn-primary btn-lg" type="button" title="I want to propose a solution">Answers</button>
                    </div>
                    <div class="col-lg-6">
                        <img src="/images/Source-code-icon.svg" class="img-fluid rounded-circle" alt="Source code icon">
                    </div>
                </div>
            </div>
        </section>
{{--  //TODO: add auth section to this form   --}}
     {{--  <!-- How It Works Section -->  --}}
        <section id="how-it-works" class="p-5 mb-4 bg-light rounded-3">
            <div class="container">
                <div class="text-center row">
                    <div class="col-md-4">
                        <h2>Step 1</h2>
                        <h4>a.</h4>
                        <p>If not a member register</p>
                        <a href="/register" class="btn btn-primary">register</a>
                        <h4>b.</h4>
                        <p>If a member login</p>
                        <a href="/login" class="btn btn-primary">login</a>
                    </div>
                    <div class="col-md-4">
                        <h2>Step 2</h2>
                        <h4>a.</h4>
                        <p>Ask a question or propose a project.</p>
                        <a href="/question.create" class="btn btn-primary">Connect</a>
                        <h4>b.</h4>
                        <p>If you are an expert and/or developer, browse our questions</p>
                        <a href="/question.browse" class="btn btn-primary">browse</a>
                    </div>
                    <div class="col-md-4">
                        <h2>Step 3</h2>
                        <p>Work together to bring your project to life.</p>
                        <small>Use the about page to learn more about srccode</small>
                        <a href="/about" class="btn btn-primary">about</a>
                        <p>use our srccoder-pedia, or view our srccoder-news</p>
                    </div>
                </div>
            </div>
        </section>
        
        {{--  <!-- Recent Questions Feed -->  --}}
<section class="py-5">
    <div class="container">
        <h2 class="mb-3">Recent Questions</h2>
        <div class="list-group">
            @foreach ($recentQuestions as $question)
            @auth
                <a href="{{ route('questions.show', $question->slug) }}" class="list-group-item list-group-item-action">
                @else
                <a href="{{ route('login') }}" class="list-group-item list-group-item-action">

            @endauth
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $question->title }}</h5>
                        <small>{{ $question->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-1">{{ Str::limit($question->body, 100) }}</p>
                    {{--  <small>{{ $question->category->name }}</small>  --}}
                </a>
            @endforeach
        </div>
    </div>
</section>
        
        {{--  <!-- Categories / Tags -->  --}}
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="mb-3">Categories / Tags</h2>
                <div class="row">
                    <!-- Replace with a loop to render categories / tags dynamically -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Category / Tag Name</h5>
                                <p class="card-text">Some description about the category or tag...</p>
                            </div>
                        </div>
                    </div>
                    <!-- End of loop -->
                </div>
            </div>
        </section>
        
        {{--  <!-- Statistics -->  --}}
<section class="py-5">
    <div class="container">
        <h2 class="my-4 mb-3 text-center shadow-xl border-bottom border-success">Statistics</h2>
        <div class="text-center row">
            <div class="py-2 my-2 rounded-lg shadow-lg col-md-4 col-sm-12 ">
                <h3>{{ $totalUsers }}</h3>
                <p >Users</p>
            </div>
            <div class="py-2 my-2 rounded-lg shadow-lg col-md-4 col-sm-12">
                <h3>{{ $totalQuestions }}</h3>
                <p>Questions</p>
            </div>
            <div class="py-2 my-2 shadow-lg col-md-4 rounded-large col-sm-12">
                <h3>{{ $totalAnswers }}</h3>
                <p>Answers</p>
            </div>
        </div>
    </div>
</section>

        
</x-app-guest>

