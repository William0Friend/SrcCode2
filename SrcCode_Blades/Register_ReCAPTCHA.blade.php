@php # Initialize session
 session_start();

# Check if user is already logged in, If yes then redirect him to User page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == TRUE) {
    echo "<script>" . "window.location.href='./User.php'" . "</script>";
    exit;
} @endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Javascript-->
    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
	<!-- recaptcha -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!-- jquery validate -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
	
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
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                                 
 @if (!isset($_SESSION["loggedin"])) 
 
<!--                 <li class="nav-item"> -->
<!--                     <a class="nav-link" href="Register.php" title="Register">Register</a> -->
<!--                 </li> -->
                <li class="nav-item">
                    <a class="nav-link active" href="Register_ReCAPTCHA.php" title="Register">Register</a>
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


    <main>
<div class="container">
    <h2 class="my-3 text-center">Registration Form</h2>
    <form id="registrationForm" action="register_recaptcha_action.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label fw-bold">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Please choose a new username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Please enter your email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Please enter your password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label fw-bold">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Please confirm your password" required>
        </div>
         
         
                <!-- Add reCAPTCHA -->
         <div class="g-recaptcha" data-sitekey="6LeX8QgmAAAAAOcNiIR33KEX93i3VpayxDWzBKzu">
         
         </div>
         <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary align-center">Register</button>
         </div>
         </form>
</div>

<script>
//     document.getElementById("registrationForm").addEventListener("submit", function(event){
//         var username = document.getElementById("username").value;
//         var email = document.getElementById("email").value;
//         var password = document.getElementById("password").value;
//         var confirm_password = document.getElementById("confirm_password").value;
        
//         var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // email regex for validation
// 		var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/; //password regex for validation
//         if(username == ""){
//             alert("Username cannot be empty");
//             event.preventDefault(); // Prevent form submission
//         }
        
//         if(email == ""){
//             alert("Email cannot be empty");
//             event.preventDefault(); // Prevent form submission
//         } else if(!emailRegex.test(email)){
//             alert("Please enter a valid email");
//             event.preventDefault(); // Prevent form submission
//         }

//         if(password == ""){
//             alert("Password cannot be empty");
//             event.preventDefault(); // Prevent form submission
//         }else if(password.length < 10 || password.length > 19){
//             alert("Password must be between 10 and 18 characters");
//             event.preventDefault(); // Prevent form submission
//         }else if(!passwordRegex.test(Password)){
//             alert("Please enter a valid password, a correct password has a minimum of 10 and maximum of 18 characters, at least one uppercase letter, one lowercase letter, one number and one special character.");
//             event.preventDefault(); // Prevent form submission
//         }

//         if(password != confirm_password){
//             alert("Passwords do not match");
//             event.preventDefault(); // Prevent form submission
//         }

// /*         Minimum eight characters, at least one letter and one number:

//         	"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
//         	Minimum eight characters, at least one letter, one number and one special character:

//         	"^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
//         	Minimum eight characters, at least one uppercase letter, one lowercase letter and one number:

//         	"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"
//         	Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:

//         	"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
//         	Minimum eight and maximum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character:

//         	"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$" */
//     });
</script>

<script>
$(document).ready(function() {
    $("#registrationForm").validate({
        rules: {
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 10,
                maxlength: 18,
                pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Username cannot be empty"
            },
            email: {
                required: "Email cannot be empty",
                email: "Please enter a valid email"
            },
            password: {
                required: "Password cannot be empty",
                minlength: "Password must be between 10 and 18 characters",
                maxlength: "Password must be between 10 and 18 characters",
                pattern: "Please enter a valid password, a correct password has a minimum of 10 and maximum of 18 characters, at least one uppercase letter, one lowercase letter, one number and one special character."
            },
            confirm_password: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>

</main>


    <!--Footer-->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2023 Company, Inc</p>

           

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