<?php
session_start();
require_once 'database/dbconnection.php';

if(isset($_POST['submit'])){
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
                $_SESSION['login'] = true;
                header('Location: dashboard.php');
                exit();
            } else {
                echo "<script>alert('Invalid Email or Password');</script>";

                
            }
        } else {
            echo "<script>alert('Invalid User/ Please Sign Up');</script>";
            ?>
            <script>
                swal({
                    title: "Login Unsuccessfully!",
                    text: "Invalid Usre Id/Password",
                    icon: "error",
                    button: false,
                    timer: 6000 
                    });
            </script>
        
        <?php  
           
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>


    <section class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Codingkart Test</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="nav-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navs">
                        <ul>
                            <li><a href="signup.html">Sign Up</a></li>
                            <li><a href="loginhtml.php" class="active">Login</a></li>
                            <!-- <li><a href="dashboard.php">Dashboard</a></li> 
                         <li><a href="property.html">Add Property</a></li>  -->
                            <!-- <li><a href="list.php">List Property</a></li> -->
                            <!-- <li><a href="del.php">Delete/Edit Property</a></li> -->
                            <!--  <li><a href="search-page.html">Search Property</a></li> -->

                        </ul>

                        <a href="#" class="mobile-icon"><i class="fa fa-bars" aria-hidden="true"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </section>






    <section class="main-content paddnig80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-width">

                        <h2>Login</h2>
                        <?php
                        // $count = 0;
                        if (isset($_SESSION['signup']) && $_SESSION['signup'] === true) {
                            // $count = 1;
                        ?>
                            <script>
                                swal({
                                    title: "Sign Up Successfully!",
                                    text: "Please Continue To Login",
                                    icon: "success",
                                    button: false,
                                    timer: 5000
                                });
                            </script>

                        <?php

                        }


                        unset($_SESSION['signup']);
                        ?>
                        <form class="login-form" id="form" action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">

                            <div class="form-field">
                                <label>Email Address*</label>
                                <input type="email" id="email" name="email" placeholder="Enter your Email Address">
                                <spam id="email_error" style="color: red;"></spam>
                            </div>
                            <div class="form-field">
                                <label>Password*</label>
                                <input type="password" id="password" name="password" placeholder="Enter Password">
                                <spam id="password_error" style="color: red;"></spam>
                                <div class="formcheck">
                                    <input type="checkbox" id="remember" checked>
                                    <label for="remember">Remember me</label>
                                </div>
                                <a href="forgetpass.php" class="forgetpwd">forget password?</a>
                            </div>

                            <div class="form-field">
                                <input type="submit" name="submit" value="Login">
                            </div>

                            <p class="alredy-sign">Sign up <a href="signup.html"><u> Now</u></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/login.js" type="text/javascript"></script>
</body>

</html>

