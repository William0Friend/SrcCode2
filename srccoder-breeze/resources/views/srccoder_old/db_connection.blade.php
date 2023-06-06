{{--  Check connection --}}
{{--  Create connection --}}
{{--  db_connection.php --}}
@php $servername = "localhost";
$username = "root";
$password = "N0th1ng4u";
$dbname = "srccode0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo '<div>Connected successfully</div>'; @endphp