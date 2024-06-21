<?php
session_start();
require_once 'database/dbconnection.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$getId = $_GET['id'];
$_SESSION['id'] = $getId;


$sql = "SELECT*FROM addproperty WHERE pid ='$getId'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    if ($_SESSION['email']) {
        $sql = "DELETE FROM addproperty WHERE pid = '$getId'";
    } else {
        echo "<script> alertall('Please Login ')</script>";
        header("location : loginhtml.php");
        exit();
    }
    $result = mysqli_query($conn, $sql);

    if ($result) {
        
        header('Location: property-list.php');
    } else {
        
        echo "Error deleting property: " . $conn->error;
    }
} else {
   
    echo "Error: Property with ID $getId does not exist.";
}


$conn->close();
?>
