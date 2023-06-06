{{--  No user found with that username --}}
{{--  Password is incorrect --}}
{{--  Password is correct, start the session --}}
{{--  Verify the password --}}
{{--  Output data of each row --}}
{{--  Retrieve the user's data from the database --}}
{{--  Get the submitted form data --}}
{{--  Check connection --}}
{{--  Create connection --}}
{{--  Enable error reporting --}}
{{--  Start the session --}}
@php session_name('srccode');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "root";
$password = "N0th1ng4u";
$dbname = "srccode0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

$sql = "SELECT * FROM Users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                if (password_verify($password, $row["password"])) {
                        $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            echo json_encode(['success' => true, 'message' => 'Login successful.']);
        } else {
                        echo json_encode(['success' => false, 'message' => 'Password is incorrect.']);
        }
    }
} else {
        echo json_encode(['success' => false, 'message' => 'No user found with that username.']);
}

$conn->close(); @endphp
