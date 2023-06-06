{{--  only if $username is set with the user's username --}}
{{--  If the login is successful: --}}
{{--  Process the login... --}}
{{--  print it out for success --}}
{{--  Hash the password --}}
{{--  Check connection --}}
{{--  register_action.php --}}
{{-- require 'db_connect.php'; --}}
@php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_name('srcode');
session_start();



require 'db_connection.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "Hashed password: " . $hashed_password;



$sql = "INSERT INTO Users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
  echo json_encode(['success' => true, 'message' => 'Registration successful.']);
} else {
  echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
}

$conn->close();


    $_SESSION['loggedin'] = true;
$_SESSION['username'] = $username; @endphp