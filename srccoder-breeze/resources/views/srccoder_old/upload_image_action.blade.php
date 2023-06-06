
{{--  Close connection --}}
{{--  Execute the statement --}}
{{--  Prepare SQL statement --}}
{{--  Check connection --}}
{{--      $conn = new mysqli($servername, $username, $password, $dbname); --}}
{{--      {{--      $dbname = "srccode0"; --}}
{{--      $password = "N0th1ng4u"; --}}
{{--      $username = "root"; --}}
{{--      $servername = "localhost"; --}}
{{--      {{--  Function to insert image into UserImage table --}}
{{--  Assuming you're using PHP session to store logged in user's id --}}
{{--  Now you can insert this image into the database --}}
{{--      } --}}
{{--          echo "Sorry, there was an error uploading your file."; --}}
{{--      } else { --}}
{{--          insertUserImage($user_id, $image_path); --}}
{{--          $image_path = $target_file; --}}
{{--          $user_id = $_SESSION['id']; {{--          {{--          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded."; --}}
{{--      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { --}}
{{--  if everything is ok, try to upload file --}}
{{-- {{--  Check if $uploadOk is set to 0 by an error --}}
{{--  Allow certain file formats --}}
{{--  Check file size --}}
{{--  Check if file already exists --}}
{{--  Check if image file is a actual image or fake image --}}
{{-- @php $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    
        
    
    
} else {
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                $user_id = $_SESSION['id'];         $image_data = file_get_contents($target_file);
        insertUserImage($user_id, $image_data);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
}


function insertUserImage($user_id, $image_data) {
    
    require 'db_connection.php';
    
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
        $stmt = $conn->prepare("INSERT INTO UserImage (user_id, image_data) VALUES (?, ?)");
    $stmt->bind_param("ib", $user_id, $image_data);
    
        if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
        $stmt->close();
    $conn->close();
} @endphp
