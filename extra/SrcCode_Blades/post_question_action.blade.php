{{--  Redirect user to same page, to clean out the form --}}
{{--  Update question with the bounty_id --}}
{{--  Insert the bounty into the Bounties table --}}
{{--  Insert the question into the Questions table and get the ID --}}
{{--  Database connection --}}
{{--  Get the user ID from the session --}}
{{--  Get the title, body, and bounty from the request --}}
@php header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: Login.php');
    exit;
}
$title = htmlspecialchars($_POST['title']);
$body = htmlspecialchars($_POST['body']);
$bounty = htmlspecialchars($_POST['bounty']);

$userId = $_SESSION['id'];

require 'db_connection.php';

$sql = "INSERT INTO Questions (user_id, title, body) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $userId, $title, $body);
$stmt->execute();
$questionId = $stmt->insert_id;


$sql = "INSERT INTO Bounties (user_id, question_id, amount) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $userId, $questionId, $bounty);
$s = $stmt->execute();
if ($s) {
        $bountyId = $stmt->insert_id;
    $sql = "UPDATE Questions SET bounty_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $bountyId, $questionId);
    $stmt->execute();
    
    echo json_encode(['success' => true, 'message' => 'Question posted successfully.']);
    header("Location: Post_Question_Form.php"); } else {
    echo json_encode(['success' => false, 'message' => 'Failed to post question. Error: '.$conn->error]);
}
$stmt->close();
$conn->close(); @endphp


