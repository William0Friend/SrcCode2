{{--  Check connection --}}
{{--  Create connection --}}
{{-- error xdebug reporting --}}
@php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "N0th1ng4u";
$dbname = "srccode";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"; @endphp