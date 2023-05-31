@php session_start();

if (!isset($_SESSION['loggedin'])) {
     header('Location: Login.php');
     exit;
 } @endphp

{{--  $stackOverflowClone->deleteQuestion(1); --}}
{{--  Delete Question --}}
{{--  $stackOverflowClone->deleteUser(1); --}}
{{--  Delete User --}}
{{--  Update Question --}}
{{--  Update User --}}
{{--  Get Question --}}
{{--  Get User --}}
{{--  Create Question --}}
{{--  Create User --}}
{{--  Example Usage: --}}
{{--  Check connection --}}
{{--  Create connection --}}
@php class StackOverflowClone {
        private $conn;

        function __construct() {
            $servername = "localhost";
            $username = "Will";
            $password = "N0th1ng4u";
            $dbname = "srccode0";

                        $this->conn = new mysqli($servername, $username, $password, $dbname);

                        if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        function createUser($username, $password, $email) {
            $sql = "INSERT INTO Users (username, password, email) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sss", $username, $password, $email);
            $stmt->execute();
            $stmt->close();
        }

        function createQuestion($userId, $title, $body) {
            $sql = "INSERT INTO Questions (user_id, title, body) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iss", $userId, $title, $body);
            $stmt->execute();
            $stmt->close();
        }

        function getUser($id) {
            $sql = "SELECT * FROM Users WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            return $user;
        }

        function getQuestion($id) {
            $sql = "SELECT * FROM Questions WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $question = $result->fetch_assoc();
            $stmt->close();
            return $question;
        }

        function updateUser($id, $username, $password, $email) {
            $sql = "UPDATE Users SET username = ?, password = ?, email = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssi", $username, $password, $email, $id);
            $stmt->execute();
            $stmt->close();
        }

        function updateQuestion($id, $userId, $title, $body) {
            $sql = "UPDATE Questions SET user_id = ?, title = ?, body = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("issi", $userId, $title, $body, $id);
            $stmt->execute();
            $stmt->close();
        }

        function deleteUser($id) {
            $sql = "DELETE FROM Users WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }

        function deleteQuestion($id) {
            $sql = "DELETE FROM Questions WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }

        $stackOverflowClone = new StackOverflowClone();

        $stackOverflowClone->createUser('JohnDoe', 'password', 'john.doe@example.com');

        $stackOverflowClone->createQuestion(1, 'PHP question', 'How do I connect to a MySQL database using PHP?');

        $user = $stackOverflowClone->getUser(1);
    echo "User: " . $user['username'] . "\n";

        $question = $stackOverflowClone->getQuestion(1);
    echo "Question: " . $question['title'] . "\n";

        $stackOverflowClone->updateUser(1, 'JaneDoe', 'newPassword', 'jane.doe@example.com');

        $stackOverflowClone->updateQuestion(1, 1, 'Updated PHP question', 'How do I use mysqli in PHP?'); @endphp
