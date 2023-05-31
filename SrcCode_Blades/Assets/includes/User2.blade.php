@php session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: Login.php');
    exit;
} @endphp


<!-- userpage.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script></head>
<body>
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
                    <a class="nav-link" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Register.php" title="Register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Register_ReCAPTCHA.php" title="Register">Register_ReCAPTCHA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Login.php" title="Login">Login</a>
                </li>
                <!-- pages only avaalile to the user -->
                 
 @if (isset($_SESSION["loggedin"])) 
 
                <li class="nav-item">
                    <a class="nav-link" href="Question.php" title="question">Question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="User.php" title="User">User</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="Post_Question.php" title="Post Question">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Sell_Source_Code.php" title="Sell Source Code">Sell</a>
                </li>
                 
 @endif 
 
                <li class="nav-item">
                    <a class="nav-link" href="AboutUs.php" title="Register">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    </header>

    <main>
        <div id="userDetails">
            <!-- The user details will be loaded dynamically using JavaScript/jQuery -->
            @php $_SESSION["loggedin"] = true; @endphp
                @php $_SESSION["username"] = $_POST["username"]; @endphp
                @php $_SESSION["password"] = $_POST["password"]; @endphp
                @php echo $_SESSION["username"];
                echo $_SESSION["password"];
                echo $_SESSION["loggedin"]; @endphp
        </div>
    
        <div id="userActivity">
            <!-- The user activity will be loaded dynamically using JavaScript/jQuery -->
        </div>

        <div> 
            <h1> User Page </h1>
             
 @if (isset($_SESSION["loggedin"])) 
 
                <p> Welcome back, {!! $_SESSION["username"] !!}!</p>
                <p> <a href="logout.php">Logout</a> </p>
             
 @endif 
 
            <script> 
            //create a table that displays the user's information
                function createTableUserInfo() {
                    var table = document.createElement("table");
                    var row = table.insertRow();
                    var cell1 = row.insertCell();
                    var cell2 = row.insertCell();
                    cell1.innerHTML = "Username";
                    cell2.innerHTML = "Email";
                    document.body.appendChild(table);
                }
                createTableUserInfo();
            //create a table that displays the user's activity
                function createTableUserActivity() {
                    var table = document.createElement("table");
                    var row = table.insertRow();
                    var cell1 = row.insertCell();
                    var cell2 = row.insertCell();
                    cell1.innerHTML = "Activity";
                    cell2.innerHTML = "Timestamp";
                    document.body.appendChild(table);
                }
                createTableUserActivity();    
                @php if (!isset($_SESSION['username'])){ @endphp
                    alert("You are not logged in!");
                @php } else { @endphp
                    alert("Welcome back, {!! $_SESSION['username'] !!}!");    
                @php } @endphp
  

            

            
        </script>
        </div>
    
        <script>
            // Get the user ID from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const userId = urlParams.get('id');
    
            // Fetch the user details and activity from the server
            $.get("get_user.php?id=" + userId, function(data) {
                // Populate the user details
                $("#userDetails").html(`
                    <h2>${data.user.username}</h2>
                    <p>Email: ${data.user.email}</p>
                `);
    
                // Populate the user activity
                data.activity.forEach(activity => {
                    $("#userActivity").append(`<p>Activity: ${activity.activity_type}, Timestamp: ${activity.timestamp}</p>`);
                });
            });
        </script>
        </main>
    </body>
</html>
