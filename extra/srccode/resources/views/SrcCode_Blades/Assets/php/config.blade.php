{{--  config.php --}}
@php $host = 'localhost';
$dbname = 'srccode';
$user = 'root';
$password = 'N0th1ng4u';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
} @endphp