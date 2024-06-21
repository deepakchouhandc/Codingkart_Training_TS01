<?php
session_start();
require_once 'database/dbconnection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    if (empty($cpassword)) {
        echo "<script>alert('Password Required');</script>";
    } else if ($password !== $cpassword) {
        echo "<script>alert('Passwords Must Match');</script>";
    } else if (strlen($cpassword) < 8) {
        echo "<script>alert('Password must be greater than 8 characters');</script>";
    } else {
        $reset_query = "SELECT * FROM signup WHERE email='$email' AND phone ='$phone'";
        $reset_result = mysqli_query($conn, $reset_query);
        
        if ($reset_result && mysqli_num_rows($reset_result) > 0) {
            $hashed_password = password_hash($cpassword, PASSWORD_DEFAULT);
            $update_query = "UPDATE signup SET password='$hashed_password' WHERE email='$email' AND phone='$phone'";
            mysqli_query($conn, $update_query);
            $_SESSION['reset'] = true;
            echo "<script>alert('Password Reset Successfully'); window.location.href = 'reset_password.php';</script>";
            exit(); // Stop further execution
        } else {
            echo "<script>alert('Please provide a registered Email/Phone.')</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Codingkart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/global_fonts_style.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/responsive.css" type="text/css" rel="stylesheet">
    <style>
        #look {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>

</head>

<body>
    <section class="main-content paddnig80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-width">
                        <h2 style="margin-left: 150px;">Forget Password</h2>
                        <?php if(isset($_SESSION['reset']) && $_SESSION['reset']===true) { ?>
                            <script>
                                alert("Password Reset Successfully");
                                window.location.href = "loginhtml.php";
                            </script>
                        <?php }
                        unset($_SESSION['reset']);
                        ?>
                        <div id="alert-placeholder"></div>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="login-form" id="look">
                            <div class="form-field">
                                <label>Email Address*</label>
                                <input type="email" name="email" placeholder="Enter your Email Address" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                            </div>
                            <div class="form-field">
                                <label>Registred Phone No.*</label>
                                <input type="phone" name="phone" placeholder="Enter Phone No." value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" required>
                            </div>
                            <div class="form-field">
                                <label>Enter New Password.*</label>
                                <input type="password" name="password" placeholder="New Password" required>
                            </div>
                            <div class="form-field">
                                <label>Conform Password.*</label>
                                <input type="password" name="cpassword" placeholder="Conform Password" required>
                            </div>
                            <div class="form-field">
                                <input type="submit" name="submit" value="Reset">
                            </div>
                            <div class="form-field">
                                <a href="loginhtml.php" class="load-btn">Back To Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
