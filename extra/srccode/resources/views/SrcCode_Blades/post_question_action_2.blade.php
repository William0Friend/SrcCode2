{{--  Redirect user to the same page to clean out the form --}}
{{-- We are done with form now --}}
{{--  Update question with the bounty_id --}}
{{--  Insert the bounty into the Bounties table --}}
{{-- Question Urgency --}}
{{--  Insert into Question_Technology_Catagory --}}
{{--  Find the technology catagory ID --}}
{{--  Insert into Question_Programming_Language --}}
{{--  Find the programming language ID --}}
{{-- Difficulty Level --}}
{{-- Difficulty --}}
{{--  Get the question ID from the previous statement --}}
{{-- Question Title, Body, and User_id into Questions tabel, --}}
{{--  Get the user ID from the session --}}
{{--  Get the user ID from the session --}}
{{-- $bounty = htmlspecialchars($_POST['bounty']); --}}
{{-- $body = htmlspecialchars($_POST['body']); --}}
{{-- $title = htmlspecialchars($_POST['title']); --}}
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

$userId = $_SESSION['id'];

require 'db_connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->autocommit(FALSE);

try {
        $userId = $_SESSION['id'];

        #Will -> maybe seperate out body and title later
    $stmt = $conn->prepare("INSERT INTO Questions (user_id, title, body) VALUES (?, ?, ?)");
    $stmt->bind_param('iss', $userId, $_POST['title'], $_POST['body']);
    $stmt->execute();
    
        $questionId = $stmt->insert_id;
        $stmt = $conn->prepare("INSERT INTO Difficulty (question_id, difficulty) VALUES (?, ?)");
    $stmt->bind_param('is', $questionId, $_POST['difficultyID']);
    $stmt->execute();
    
        $stmt = $conn->prepare("INSERT INTO Difficulty_Level (question_id, difficulty_level) VALUES (?, ?)");
    $stmt->bind_param('is', $questionId, $_POST['difficultyLevel']);
    $stmt->execute();
 
        $programmingLanguage = $_POST['programmingLanguage'];
    $stmt = $conn->prepare("SELECT id FROM Programming_Language WHERE programming_language = ?");
    $stmt->bind_param('s', $programmingLanguage);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $programmingLanguageId = $row['id'];
        
                $stmt = $conn->prepare("INSERT INTO Question_Programming_Languages (question_id, programming_languages_id) VALUES (?, ?)");
        $stmt->bind_param('ii', $questionId, $programmingLanguageId);
        $stmt->execute();
    }
    
        $technologyCatagory = $_POST['techCatagory'];
    $stmt = $conn->prepare("SELECT id FROM Technology_Catagory WHERE technology_catagory = ?");
    $stmt->bind_param('s', $technologyCatagory);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $technologyCatagoryId = $row['id'];
        
                $stmt = $conn->prepare("INSERT INTO Question_Technology_Catagory (question_id, technology_catagory_id) VALUES (?, ?)");
        $stmt->bind_param('ii', $questionId, $technologyCatagoryId);
        $stmt->execute();
    }
    
    
        $stmt = $conn->prepare("INSERT INTO Question_Urgency (question_id, Question_Urgency) VALUES (?, ?)");
    $stmt->bind_param('is', $questionId, $_POST['questionUrgency']);
    $stmt->execute();
    
    
    
    $stmt = $conn->prepare("INSERT INTO Question_Notes (question_id, question_notes) VALUES (?, ?)");
    $stmt->bind_param('is', $questionId, $_POST['notes']);
    $stmt->execute();
    
        $sql = "INSERT INTO Bounties (user_id, question_id, amount) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $userId, $questionId, $_POST['bounty']);
    $s = $stmt->execute();
    if ($s) {
                $bountyId = $stmt->insert_id;
        $sql = "UPDATE Questions SET bounty_id = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $bountyId, $questionId);
        $stmt->execute();
        
                echo json_encode(['success' => true, 'message' => 'Question posted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to post question. Error: '.$conn->error]);
    }
    header("Location: Post_Question_Form.php");     $conn->commit();
} catch (Exception $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn->close(); @endphp
