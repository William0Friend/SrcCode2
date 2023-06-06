{{--  Delete the question --}}
{{--  Check if delete button was clicked --}}
{{--  Update the question with the new title and body --}}
{{--  Check if update button was clicked --}}
{{--  Get the question id from POST data --}}
{{--  include the database connection --}}
@php session_start();

require 'db_connection.php'; 
if (!isset($_SESSION['loggedin'])) {
    header('Location: Login.php');
    exit;
}

$question_id = $_POST['question_id'];

if (isset($_POST['update'])) {
    $new_title = $_POST['new_title'];
    $new_body = $_POST['new_body'];
    
        $query = $conn->prepare('UPDATE Questions SET title = ?, body = ? WHERE id = ? AND user_id = ?');
    $query->bind_param('ssii', $new_title, $new_body, $question_id, $_SESSION['id']);
    $query->execute();
    
    header('Location: Users.php');
    exit;
}

if (isset($_POST['delete'])) {
        $query = $conn->prepare('DELETE FROM Questions WHERE id = ? AND user_id = ?');
    $query->bind_param('ii', $question_id, $_SESSION['id']);
    $query->execute();
    
    header('Location: Users.php');
    exit;
} @endphp
