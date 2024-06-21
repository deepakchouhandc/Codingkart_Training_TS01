<?php
session_start();
// $id = $_GET['id'];

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    die('User is not logged in.');
}

// Database connection
require_once 'database/dbconnection.php';
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and assign the input data
    $prop_name = mysqli_real_escape_string($conn, $_POST['pname']);
    $prop_type = mysqli_real_escape_string($conn, $_POST['ptype']);
    $prop_price = mysqli_real_escape_string($conn, $_POST['pprice']);
    $prop_location = mysqli_real_escape_string($conn, $_POST['plocation']);
    $prop_description = mysqli_real_escape_string($conn, $_POST['pdescription']);

    // Handle the property image upload
    if (isset($_FILES['peditimage']) && $_FILES['peditimage']['error'] == 0) {
        $imagename = $_FILES['peditimage']['name'];
        $imagetemp = $_FILES['peditimage']['tmp_name'];
        $folder = "Property-Image/" . $imagename;
        move_uploaded_file($imagetemp, $folder);
    } else {
        // Use the existing image if no new image is uploaded
        $folder = $_POST['existing_pimage'];
    }

    // Update query
    $update = "UPDATE addproperty SET pname = '{$prop_name}', ptype = '{$prop_type}', pprice = '{$prop_price}', plocation = '{$prop_location}', pimage = '{$folder}',pdescription = '$prop_description' WHERE pid = '{$_SESSION['id']}'";
    echo $update;
    $q = mysqli_query($conn, $update);
    // echo $update;  

    if (mysqli_query($conn, $update)) {

        // echo "$q";

        header('Location: property-list.php');
        exit();
        // echo "INside the if ";
    } else {

        echo 'Error updating property: ' . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
