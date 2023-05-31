{{--  Display status message --}}
{{--  Insert image file name into database --}}
{{--  Upload file to server --}}
{{--  Allow certain file formats --}}
{{-- $targetDir = "/var/www/html/uploads/"; --}}
{{--  File upload path --}}
{{--  Include the database configuration file --}}
@php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'db_connection.php';
$statusMsg = '';

$targetDir = "/home/william0friend/gits/SrcCode/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);




if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $insert = $conn->query("INSERT into images (file_name, uploaded_on, user_id) VALUES ('".$fileName."', NOW() , '".$_SESSION['id']."')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

header('Location: Users.php');

echo $statusMsg; @endphp