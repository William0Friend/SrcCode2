{{--@yield('srccoder._header');--}}
<x-app>
        {{--  <!--<h1>Hello, world!</h1>-->
        <!--Carosel-->
        <!-- Images (optimized for web sites) -->  --}}
        <div id="" class="w-1/2 carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/pexels-neo-2653362.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/pexels-andrea-piacquadio-3784324.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/pexels-pok-rie-1432669.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        <!--JumboTron-->
        <section id="mission-statement" class="p-5 mb-4 bg-light rounded-3">
            <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="py-5">
                <h1 class="display-5 fw-bold">$rcCode Mission Statement</h1>
                <p class="col-md-8 fs-4">
                    $rcCodes mission is to empower independant business owners, dreamers,
                    non-technical creatives, or anyone who may have problems that need techincal expertice to solve,
                    by providing an easy to use platform, to connect with
                    developers, engineers, scientists, and programmers. With $rcCode you can easily purpose your problem,
                    find your expert, hire, and carry your project through to production, inside the same app.

                </p>
                <ul>
                        <li>All payments handled through stripe, square, or crypto.</li>
                        <li> All code hosted through github.</li>
                        <li> Both Public and Anonymous problem and solutions transactions are avalible.</li>
                    </ul>
                <button class="btn btn-danger btn-lg" type="button" title="I want to prepose a question">Questions</button>
                <button class="btn btn-primary btn-lg" type="button" title="I want to prepose a solution">Answers</button>

            </div>
        </div>
    </div>
        </section>

    <!-- How It Works Section -->
        <section id="how-it-works" class="p-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Step 1</h2>
                        <p>Ask a question or propose a project.</p>
                    <div class="container">
                        <a href="Post_Question_Form.php"><button>Questions</button></a>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <h2>Step 2</h2>
                        <p>Connect with experts and developers.</p>
                            <a href="Sell_Source_Code.php"><button>Answers</button></a>
                    </div>
                    <div class="col-md-4">
                        <h2>Step 3</h2>
                        <p>Work together to bring your project to life.</p>
                    </div>
                </div>
            </div>
        </section>

    </x-srccoder>
</x-app>
{{--@yeild('srccoder._footer')--}}
