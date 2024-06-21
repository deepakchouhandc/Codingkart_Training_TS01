<?php
session_start();
require_once 'database/dbconnection.php';


if (isset($_POST["btnsave"])) {
    $name = $_POST["fname"];
    if (empty($name)) {
        die("First Name is Required");
    } else {

        $name = trim($name);
        $name = htmlentities($name);
        if (!preg_match("/^[a-zA-Z]+$/", $name)) {
            die("Name should contein only character and space");
        }
    }
    $lname = $_POST["lname"];
    if (empty($lname)) {
        die("Last Name is Required");
    } else {
        $lname = trim($lname);
        $lname = htmlentities($lname);
        if (!preg_match("/^[a-zA-Z]+$/", $lname)) {
            die("Nmae should contein only character and space");
        }
    }
    $email = $_POST["email"];
    if (empty($email)) {
        die("Email is Required");
    } else {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Please Enter Valid Email");
        }
    }
    $password = $_POST["mpassword"];
    if (empty($password)) {
        die("Password is Required");
    } else if (strlen($password) < 8) {

        die("Password Must Be Greater Then 8 Digit");
    }
    $cpassword = $_POST["cpassword"];

    if (empty($cpassword)) {
        die("Password is Requried");
    } else if ($password !== $cpassword) {
        die("Password Must Be Same");
    } else if (strlen($cpassword) < 8) {

        die("Password Must Be Greater Then 8 Digit");
    }
    $password_hash = password_hash($cpassword, PASSWORD_DEFAULT);

    $number = $_POST["phone"];
    if (empty($number)) {
        die("Phone Number is Required");
    }
    $address = $_POST["address"];
    if (empty($address)) {
        die("Address is Required");
    }
    $file = $_FILES['image'];

    $filename = $file['name'];
    if (empty($filename)) {
        die("Profile Image is Required");
    }
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    if ($fileerror == 0) {
        $destfile = 'user-image/' . $filename;
        move_uploaded_file($filepath, $destfile);

        $checkEmailQuery = "SELECT email FROM signup WHERE email = '$email'";
        $checkEmailResult = mysqli_query($conn, $checkEmailQuery);
         
        if (mysqli_num_rows($checkEmailResult) > 0) {
            // Email already exists, handle as needed
            echo "<script type='text/javascript'>alert('This email is already registered. Please Continue with Login');
                  window.location.href = 'Loginhtml.php'; // Redirect back to the signup page or another appropriate page
                  </script>";
            exit();
        }
        $checkPhoneQuery = "SELECT phone FROM signup WHERE phone = '$number'";
    $checkPhoneResult = mysqli_query($conn, $checkPhoneQuery);

    if (mysqli_num_rows($checkPhoneResult) > 0) {
        // Phone number already exists, handle as needed
        echo "<script type='text/javascript'>alert('This phone number is already registered.');
              window.location.href = 'signup.html'; // Redirect back to the signup page or another appropriate page
              </script>";
        exit();
    }


        if ($name != "" && $lname != "" && $name != "" && $email != "" && $password != "" && $cpassword != "" && $number != "" && $address != "" && $file != "") {
            $sql = "INSERT INTO signup (firstname ,lastname ,email , password,phone ,address,image) values('$name','$lname','$email','$password_hash','$number','$address','$destfile')";
            mysqli_query($conn, $sql);

            // Set session variable after successful signup
            $_SESSION['signup'] = true;

            // echo $_SESSION['signup'];

            // Redirect to login page
            header('Location: loginhtml.php');
            exit();
        } else {
            echo "<script type='text/javascript'>alert('All field are Required.');
                        window.location.href = 'signup.html'
                  </script>";
        }
    }
    // echo "<script>alert('Signup Successful');</script>";

    // header('Location:loginhtml.php');

    // exit();
}
