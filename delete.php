<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("includes/connect.php");
    $sql = "DELETE FROM thesis WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["delete"] = "Thesis Deleted Successfully";
        header("location: index.php");
    }
}
?>