{{--  Get the user ID from the session --}}
{{-- } --}}
{{--     exit; --}}
{{--     echo json_encode(['success' => false, 'message' => 'Not logged in']); --}}
{{-- if (!isset($_SESSION['userId'])) { --}}
{{--  Check if the user is logged in --}}
{{--  Database connection --}}
{{--  Start the session --}}
{{--  Name the session --}}
{{-- error xdebug reporting --}}
{{--  submit_answer.php --}}
@php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_name('srcode');
session_start();

require 'db_connection.php';


$questionId = $_POST['questionId'];
$answer = $_POST['answer'];
$userId = $_SESSION['userId']; 
$sql = "INSERT INTO answers (question_id, user_id, answer) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $questionId, $userId, $answer);
$success = $stmt->execute();

echo json_encode(['success' => $success]); @endphp