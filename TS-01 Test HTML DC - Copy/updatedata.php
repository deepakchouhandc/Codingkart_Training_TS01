<?php
// coming form edit.php
//Auther DC
session_start();
$email = $_POST['email'];

require_once 'database/dbconnection.php';
// echo isset($conn);//1
if (!isset($conn)) {
    echo "<h2>Database is not Connected</h2>";
} else {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    // check if image is taken or not 
    if (isset($_FILES['edit_image']) && $_FILES['edit_image']['error'] == null) {
        $imagename = $_FILES['edit_image']['name'];
        $imagetemp = $_FILES['edit_image']['tmp_name'];
        $folder = "user-image/" . $imagename;
        move_uploaded_file($imagetemp, $folder);
        $image_update = ", image = '{$folder}'";
    } else {
        $folder = $_SESSION['imagedata'];
    }


    $update = "update signup set firstname = '{$firstname}',lastname = '{$lastname}',phone = '{$phone}',address = '{$address}',image = '{$folder}' where email = '{$_SESSION['email']}' ";
    // echo $update;
    $result = mysqli_query($conn, $update) or die("Query Unsuccessful");
    if (isset($update)) {
        $_SESSION['updateProfile'] = "Profile Update Successfully ......";
    } else {
        $_SESSION['updateProfile'] = "Profile Not Update Successfully ......";
    }
}
mysqli_close($conn);

header("Location: dashboard.php");
exit("Update Successfully");
