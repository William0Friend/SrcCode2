@php # Initialize session
  session_start(); @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$rcCode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</head>

<body>
<!-- Banner -->
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    @if (!isset($_SESSION["loggedin"]))

                        <!--                 <li class="nav-item"> -->
                        <!--                     <a class="nav-link" href="Register.php" title="Register">Register</a> -->
                        <!--                 </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="Register_ReCAPTCHA" title="Register">Register</a>
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
                            <a class="nav-link" href="Post_Question_Form.php" title="Post Question">Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Sell_Source_Code.php" title="Sell Source Code">Sell</a>
                        </li>

                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="AboutUs.php" title="Register">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Browse_Questions.php" title="Browse">Browse Questions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>
