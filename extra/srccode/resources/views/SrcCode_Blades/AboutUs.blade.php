﻿


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>About $rcCode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!--JavaScript-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body>
    <!--HTML5 Navigation-->
            <!-- HTML5 Navigation -->
    <!-- Navigation bar -->
   <!-- Hyperlinks to other pages -->
   <header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" title="SrcCode - Sell Your Src Code">$rcCode</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                                 
 @if (!isset($_SESSION["loggedin"])) 
 
<!--                 <li class="nav-item"> -->
<!--                     <a class="nav-link" href="Register.php" title="Register">Register</a> -->
<!--                 </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="Register_ReCAPTCHA.php" title="Register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Login.php" title="Login">Login</a>
                </li>
                 
 @endif 
 
                <!-- pages only avaalile to the user -->
                 
 @if (isset($_SESSION["loggedin"])) 
 
                <li class="nav-item">
                    <a class="nav-link" href="User.php" title="User">User</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="Post_Question_Form.php" title="Post Question">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Sell_Source_Code.php" title="Sell Source Code">Sell</a>
                </li>
                 
 @endif 
 
                <li class="nav-item">
                    <a class="nav-link active" href="AboutUs.php" title="About Us">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Browse_Questions.php" title="About Us">Browse Questions</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    </header>


    <!--JumboTron-->
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">$rcCode Mission Statement</h1>
            <p class="col-md-8 fs-4">
                $rcCode's mission is to empower independant business owners, dreamers,
                non-technical creatives, or anyone who may have problems that need techincal expertice to solve,
                by providing an easy to use platform, to connect with
                developers, engineers, scientists, and programmers. With $rcCode you can easily purpose your problem,
                find your expert, hire, and carry your project through to production, inside the same app.
            </p>
             <ul>
                    <li> All payments handled through stripe, square, or crypto.</li>
                    <li> All code hosted through github.</li>
                    <li> Both Public and Anonymous problem and solutions transactions are avalible.</li>
                </ul>
            <button class="btn btn-primary btn-lg" type="button" title="I want to prepose a problem">Problems</button>
            <button class="btn btn-primary btn-lg" type="button" title="I want to prepose a solution">Solutions</button>

        </div>
    </div>
 <!--Footer-->
 <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2023 Company, Inc</p>

        <!--<a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        </a>-->

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
        </svg>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="Index.html" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="Features.html" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="Pricing.html" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="FAQ.html" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="AboutUs.html" class="nav-link px-2 text-muted">About</a></li>
        </ul>
    </footer>
</div>
  
</body>
</html>