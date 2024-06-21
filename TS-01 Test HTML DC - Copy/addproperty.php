<?php
// Author DC....
// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
require_once 'database/dbconnection.php';
session_start();

if ($_SESSION) {
    $prop_name = $_POST['pname'];
    $prop_type = $_POST['ptype'];
    if (($prop_type == "property-type")) {
        die("Please Select the property type");
    } else {
        if (!($prop_type == 'Rent' || $prop_type == 'Sell')) {
            die("Please Select the Given Type Only");
        }
    }

    $imagename = $_FILES['pimage']['name'];
    // print_r($_FILES['pimage'])."<br>";
    $tempname = $_FILES['pimage']['tmp_name'];
    $folder = "Property-Image/" . $imagename;
    move_uploaded_file($tempname, $folder);

    $prop_price = $_POST['pprice'];
    $prop_location = $_POST['plocation'];
    $prop_descpription = $_POST['pdescription'];
    $prop_desc = str_replace("'", "~", $prop_descpription);

    $pemail = $_SESSION['email'];


    $insert = "insert into addproperty (pname, ptype, pprice, pimage, plocation , pdescription,pemail) values('$prop_name','$prop_type','$prop_price','$folder','$prop_location','$prop_desc','$pemail')";
    // echo "<pre>";
    // print_r($conn);
    // echo "</pre>";
    //  echo $insert."<br> after the insert and printr";

    // echo "<br> berfor the result";

    $result = mysqli_query($conn, $insert) or die("Query Unsuccessfull");
    //  echo "<br> after the result";
    $_SESSION['message'] = "Property Add Successfully";

    header("Location: property-list.php");

    mysqli_close($conn);
} else {
    header("location:loginhtml.php");
}
