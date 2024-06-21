<?php
session_start();
$email = $_SESSION['email'];

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
        #ed-btn {

            width: 16%;
            ;
            display: inline-block;
            text-align: center;
            margin-top: 40px;

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
    </style>

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
                            <!-- <li><a href="signup.html">Sign Up</a></li> -->
                            <!-- <li><a href="loginhtml.php">Login</a></li> -->
                            <?php if ($_SESSION) {
                            ?>
                                <li><a href="property.php">Add Property</a></li>
                                <li><a href="property-list.php" class="active">List Property</a></li>
                                <li><a href="search-page.php">Search Property</a></li>
                                <li><a href="dashboard.php">Dashboard</a></li>
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



    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p><?php echo $_SESSION['message']; ?></p>
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
        unset($_SESSION['message']);
    endif;
    ?>
    <section class="main-content paddnig80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-width">
                        <h2>Property Listings</h2>
                        <?php

                        require_once 'database/dbconnection.php';
                        // $select = "select * from addproperty";
                        $select = "SELECT * FROM addproperty
                        ORDER BY (pemail = '$email') DESC, 1;";

                        $result = mysqli_query($conn, $select);

                        if (mysqli_num_rows($result) > 0) {


                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <div class="product-list">
                                    <img style="border: 2px solid rgb(178 175 175); border-radius: 8px; " src="<?php echo $row['pimage'];  ?>" alt="home" height="148px" width="147px" class="property-img">
                                    <ul>

                                        <!-- <li><img src="images/icon-id1.png" alt="user"><strong>Property ID: </strong></li> -->
                                        <li><img src="images/icon-user.png" alt="user"><strong>Property Name: </strong><?php echo $row['pname']  ?></li>
                                        <li><img src="images/icon-home.png" alt="home"><strong>Property Type: </strong><?php echo $row['ptype']  ?></li>
                                        <li><img src="images/icon-doller.png" alt="doller"><strong>Price: </strong><?php echo "₹ " . $row['pprice']  ?></li>
                                        <li><img src="images/icon-location.png" alt="location"><strong>Location: </strong><?php echo $row['plocation']  ?></li>
                                    </ul>

                                    <li><strong>About Property : </strong></li>
                                    <p><?php echo $row['pdescription']  ?></p>
                                    <?php
                                    if ($_SESSION) {
                                        if ($row['pemail'] == $_SESSION['email']) { ?>
                                            <a href="editProperty.php?id=<?php echo $row['pid'] ?>" id="ed-btn">Edit</a>
                                            <a href="deleteProperty.php?id=<?php echo $row['pid'] ?>" id="ed-btn">Delete</a>
                                    <?php }
                                    }
                                    ?>


                                </div>

                        <?php }
                        }

                        ?>
                        <!-- <div class="product-list">
                            <img src="images/home-23.png" alt="home" class="property-img">
                            <ul>
                               <li><img src="images/icon-user.png" alt="user"><strong>Property Name: </strong>Loreum Ipsum</li>
                               <li><img src="images/icon-home.png" alt="home"><strong>Property Type: </strong>Rent</li>
                               <li><img src="images/icon-doller.png" alt="doller"><strong>Price: </strong>$ 132,556</li>
                               <li><img src="images/icon-location.png" alt="location"><strong>Location: </strong>Loreum Ipsum</li>
                          </ul>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a sollicitudin lacus, faucibus ornare ante</p>
                          
                       </div>
                       
                        <div class="product-list">
                            <img src="images/home-23.png" alt="home" class="property-img">
                            <ul>
                               <li><img src="images/icon-user.png" alt="user"><strong>Property Name: </strong>Loreum Ipsum</li>
                               <li><img src="images/icon-home.png" alt="home"><strong>Property Type: </strong>Rent</li>
                               <li><img src="images/icon-doller.png" alt="doller"><strong>Price: </strong>$ 132,556</li>
                               <li><img src="images/icon-location.png" alt="location"><strong>Location: </strong>Loreum Ipsum</li>
                          </ul>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a sollicitudin lacus, faucibus ornare ante</p>
                          
                       </div> -->

                        <a href="#" class="load-btn">Load More</a>

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