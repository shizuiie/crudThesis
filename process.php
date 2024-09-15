<?php
include("includes/connect.php");
if  (isset($_POST["create"])){
    $title = mysqli_real_escape_string($conn, $_POST ["title"]); 
    $author = mysqli_real_escape_string($conn, $_POST ["author"]); 
    $course = mysqli_real_escape_string($conn, $_POST ["course"]); 
    $year = mysqli_real_escape_string($conn, $_POST ["year"]); 
    $adviser = mysqli_real_escape_string($conn, $_POST ["adviser"]); 
    $abstract = mysqli_real_escape_string($conn, $_POST ["abstract"]); 
    $file = mysqli_real_escape_string($conn, $_POST ["file"]);

    // $targetDir = "uploads/";
    // $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    // $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // //check if file is a PDF and less than 5mb
    // if($fileType != "pdf" || $_FILES["file"]["size"] > 5000000){
    //     echo "Error: Only PDF files less than 5mb are allowed to upload.";
    // }
    // else{
    //     //move uploaded file to uploads folder
    //     if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)){
    //         $filename = $_FILES["file"]["name"];
    //         $file_path = $targetDir;
    //         $time_stamp = date('Y-m-d H:i:s');
    //         $sql = "INSERT INTO file_upload (file_name, file_path, time_stamp) VALUES ('$filename', '$file_path','time_stamp')";
    //     }
    // }


    $sql = "INSERT INTO thesis (title, author, course, year, adviser, abstract, file) VALUES ('$title', '$author', '$course',  '$year',  '$adviser', '$abstract', 'file')" ;

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["create"] = "Thesis Added Successfully";
        header("location: index.php");
    }else{
        die("Something went wrong");
    };
}
if  (isset($_POST["edit"])){
    $title = mysqli_real_escape_string($conn, $_POST ["title"]); 
    $author = mysqli_real_escape_string($conn, $_POST ["author"]); 
    $course = mysqli_real_escape_string($conn, $_POST ["course"]); 
    $year = mysqli_real_escape_string($conn, $_POST ["year"]); 
    $adviser = mysqli_real_escape_string($conn, $_POST ["adviser"]); 
    $abstract = mysqli_real_escape_string($conn, $_POST ["abstract"]); 
    $file = mysqli_real_escape_string($conn, $_POST ["file"]);
    $id = mysqli_real_escape_string($conn, $_POST ["id"]);
    $sql = "UPDATE thesis SET title = '$title', author = '$author',
                              course = '$course',
                              year = '$year',
                              adviser = '$adviser',
                              abstract = '$abstract',
                              file = '$file' WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["update"] = "Thesis update Successfully";
        header("location: index.php");
    }else{
        die("Something went wrong");
    };
}
?>






<!-- <?php
include("includes/connect.php");

if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $course = mysqli_real_escape_string($conn, $_POST["course"]);
    $year = mysqli_real_escape_string($conn, $_POST["year"]);
    $adviser = mysqli_real_escape_string($conn, $_POST["adviser"]);
    $abstract = mysqli_real_escape_string($conn, $_POST["abstract"]);

    // Handle file upload
    $file = $_FILES["file"];
    $file_path = upload_file($file);

    $sql = "INSERT INTO thesis (title, author, course, year, adviser, abstract, file) VALUES ('$title', '$author', '$course', '$year', '$adviser', '$abstract', '$file_path')";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["create"] = "Thesis Added Successfully";
        header("location: index.php");
    } else {
        die("Something went wrong");
    }
}

if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $course = mysqli_real_escape_string($conn, $_POST["course"]);
    $year = mysqli_real_escape_string($conn, $_POST["year"]);
    $adviser = mysqli_real_escape_string($conn, $_POST["adviser"]);
    $abstract = mysqli_real_escape_string($conn, $_POST["abstract"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    // Check if a new file is uploaded
    if (isset($_FILES["file"]) && $_FILES["file"]["size"] > 0) {
        $file = $_FILES["file"];
        $file_path = upload_file($file);
        $sql = "UPDATE thesis SET title = '$title', author = '$author',
                              course = '$course',
                              year = '$year',
                              adviser = '$adviser',
                              abstract = '$abstract',
                              file = '$file_path' WHERE id='$id'";
    } else {
        $sql = "UPDATE thesis SET title = '$title', author = '$author',
                              course = '$course',
                              year = '$year',
                              adviser = '$adviser',
                              abstract = '$abstract' WHERE id='$id'";
    }

    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["update"] = "Thesis update Successfully";
        header("location: index.php");
    } else {
        die("Something went wrong");
    }
}

// Function to handle file upload
function upload_file($file) {
    $upload_dir = "uploads/"; // Change this to your desired upload directory
    $file_name = basename($file["name"]);
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($file["tmp_name"], $file_path)) {
        return $file_path;
    } else {
        die("Error uploading file");
    }
}
?> -->