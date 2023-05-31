{{--  Close the database connection --}}
{{--  Insert or update the image path in the database --}}
{{--  Get the user ID or any other identifier for the user --}}
{{--  Check the connection --}}
{{--  File upload failed --}}
{{--  File upload successful --}}
{{--  Move the uploaded file to the target location --}}
{{--  Check if the uploaded file is an image (you can add additional checks if needed) --}}
{{--  Check if the file was uploaded without errors --}}
@php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_FILES["imageFile"]["error"] === UPLOAD_ERR_OK) {
  $tempName = $_FILES["imageFile"]["tmp_name"];
  $fileName = $_FILES["imageFile"]["name"];
  $targetPath = "/var/www/html/uploads/" . $fileName;

    if (getimagesize($tempName) !== false) {
        if (move_uploaded_file($tempName, $targetPath)) {
            echo "File uploaded successfully.";
    } else {
            echo "Failed to upload the file.";
    }
  } else {
    echo "Invalid file format. Only image files are allowed.";
  }
} else {
  echo "Error occurred during file upload.";
}

require 'db_connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userID = $_SESSION["id"];

$imagePath = "/uploads/" . $fileName;
$sql = "UPDATE users SET image_path = '$imagePath' WHERE id = $userID";
$conn->query($sql);

$conn->close(); @endphp