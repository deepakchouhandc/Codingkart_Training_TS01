<?php
session_start();

require_once 'database/dbconnection.php';

if (!isset($_SESSION['email'])) {
    header("location: loginhtml.php");
    exit();
}
// else{
//     header("Location : signup.html");
// }

$user = $_SESSION['email'];
$query = mysqli_query($conn, "SELECT * FROM signup WHERE email='$user'");
$row = mysqli_fetch_array($query);
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
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        th {
            background-color: black;
            color: white;
        }

        th,
        td {
            width: 150px;
            text-align: center;
            border: 1px solid black;
            padding: 5px;
        }

        h2 {
            color: black;
        }

        #ed-btn {

            width: 100%;
            ;
            display: inline-block;
            text-align: center;
            /* margin-top: 40px; */

        }

        #ed-btn {
            background-color: var(--button-color);
            color: var(--white-color);
            font-size: 22px;
            font-weight: 600;
            padding: 7px 15px;
            cursor: pointer;
            transition: .2s all ease;
            border-radius: 5px;
        }

        .logout:hover {
            color: red;
        }
    </style>
    <script>
        function myFunction() {
            alert("You are want LogOut!");
        }
    </script>
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
        <?php
                // $count = 0;
            if(isset($_SESSION['login']))
            {
                // $count = 1;
                ?>
                    <script>
                        swal({
                            title: "Login Successfully!",
                            text: "Welcome aboard! Thank you for joining us.",
                            icon: "success",
                            button: false,
                            timer: 2000 
                            });
                    </script>
                
                <?php  

            }


            unset($_SESSION['login']);
        ?>
    <section class="nav-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navs">
                        <ul>
                            <!-- <li><a href="signup.html">Sign Up</a></li> -->
                            <!-- <li><a href="loginhtml.php">Login</a></li> -->
                            <?php if ($_SESSION) {
                            ?>
                                <li><a href="property.php">Add Property</a></li>
                                <li><a href="property-list.php">List Property</a></li>
                                <li><a href="search-page.php">Search Property</a></li>
                                <li><a href="dashboard.php" class="active">Dashboard</a></li>
                                <li><a href="logout.php" class="logout" onclick="myFunction()">Logout</a></li>
                            <?php } else {
                                header("location:loginhtml.php");
                            }

                            ?>
                        </ul>

                        <a href="#" class="mobile-icon"><i class="fa fa-bars" aria-hidden="true"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="main-content padding80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-width">
                        <h2>User Information</h2>
                        <?php if (isset($_SESSION['updateProfile'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading">Well done!</h4>
                                <p><?php echo $_SESSION['updateProfile']; ?></p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <script>
                                window.setTimeout(function() {
                                    $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                        $(this).remove();
                                    });
                                }, 3000);
                            </script>
                        <?php
                            unset($_SESSION['updateProfile']);
                        endif;
                        ?>

                        <table>
                            <thead>
                                <tr>
                                    <th style="padding: 10px;" class="py-3 text-black">FirstName</th>
                                    <th style="padding: 10px;" class="py-3 text-black">LastName</th>
                                    <th style="padding: 10px;" class="py-3 text-black">E-mail</th>
                                    <th style="padding: 10px;" class="py-3 text-black">Number</th>
                                    <th style="padding: 10px;" class="py-3 text-black">Address</th>
                                    <th style="padding: 10px;" class="py-3 text-black">Photo</th>
                                    <th style="padding: 10px;" class="py-3 text-black"><a href="logout.php" id="ed-btn" onclick="myFunction()">Logout</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><img src="<?php $_SESSION['imagedata'] = $row['image'];
                                                    echo $row['image']; ?>" width="100px" height="100px" alt="User Image"></td>
                                    <td><a href="editprofile.php" id="ed-btn">Update profile</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <a href="update_profile.php">Update Profile</a> -->
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
</body>

</html>