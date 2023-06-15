{{-- <!doctype html>

<header>
    <title>vid-posts</title>
    <link trel="stylesheet" href="/css/app.css" >
    <script src="/js/app.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</header>
<body class="container">
   {{$slot}}
</body> --}}
Debugbar::info($object);
Debugbar::error('Error!');
Debugbar::warning('Watch out…');
Debugbar::addMessage('Another message', 'mylabel');

<!doctype html>

<title>The Srccoder Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
{{--Tailwind--}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{--bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<!--JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="flex items-center mt-8 md:mt-0 ">
                @auth
                    <span class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name}}</span>
                    <form method="POST" action="/logout" class="ml-6 text-xs font-semibold text-blue-500">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>

                    <a href="/dashboard" class="ml-6 text-xs font-bold uppercase">Dashboard</a>
                    <a href="/" class="ml-6 text-xs font-bold uppercase">Post</a>
                @endauth
                @guest
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                    @endguest
                <a href="#" class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-blue-500 rounded-full">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{$slot}}

        <footer class="px-10 py-16 mt-16 text-center bg-gray-100 border border-black border-opacity-5 rounded-xl">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="mt-3 text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto rounded-full lg:bg-gray-200">

                    <form method="POST" action="#" class="text-sm lg:flex">
                        <div class="flex items-center lg:py-3 lg:px-5">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                   class="py-2 pl-4 lg:bg-transparent lg:py-0 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="px-8 py-3 mt-4 text-xs font-semibold text-white uppercase transition-colors duration-300 bg-blue-500 rounded-full hover:bg-blue-600 lg:mt-0 lg:ml-3"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
<x-my-flash/>
</body>
