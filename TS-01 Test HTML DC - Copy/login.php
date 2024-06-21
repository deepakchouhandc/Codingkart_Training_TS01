<?php
session_start();
require_once 'database/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT * FROM signup WHERE email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();


    if ($row) {
        if ($row['email'] == $username && password_verify($password, $row['password'])) {
            $_SESSION['email'] = $username;
            echo "<script>alert('Login Successful');</script>";
            $_SESSION['login'] = true;
            header('Location: dashboard.php');
            exit();
        } else {
            die("Invalid Email and Password");
        }
    } else {
        die("Invalid User");
    }
}

mysqli_close($conn);
