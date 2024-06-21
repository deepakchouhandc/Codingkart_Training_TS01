<?php
session_start();
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
                                <li><a href="property.php" class="active">Add Property</a></li>
                                <li><a href="property-list.php">List Property</a></li>
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

    <section class="main-content paddnig80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-width">
                        <h2>Property Form</h2>
                        <form id="form" action="addproperty.php" method="post" enctype="multipart/form-data" class="Property-form">
                            <div class="wd70">
                                <div class="form-field">
                                    <label>Property Name*</label>
                                    <input type="text" id="name" name="pname" placeholder="Enter Property Name" required>
                                    <spam id="propName_error" style="color: red;"></spam>
                                </div>
                                <div class="form-field">
                                    <label>Property Type*</label>
                                    <select id="property" name="ptype" required>
                                        <option value="property-type" hidden>Property Type</option>
                                        <spam id="propType_error" style="color: red;"></spam>
                                        <option value="Rent">Rent</option>
                                        <option value="Sell">Sell</option>
                                    </select>
                                </div>
                            </div>

                            <div class="wd30">
                                <div class="upload-picture">
                                    <div class="fileUpload">
                                        <input type="file" id="image" name="pimage" class="upload" required />
                                        <spam id="image_error" style="color: red;"></spam>
                                    </div>
                                    <label>Property Image</label>
                                </div>
                            </div>

                            <div class="form-field">
                                <label>Property Price*</label>
                                <input type="number" id="Price" name="pprice" placeholder="Enter Property Price" required>
                                <spam id="price_error" style="color: red;"></spam>
                            </div>
                            <div class="form-field">
                                <label>Property Location*</label>
                                <input type="text" id="Location" name="plocation" placeholder="Enter Location" required>
                                <spam id="location_error" style="color: red;"></spam>
                            </div>


                            <div class="form-field">
                                <label>Property Description* </label>
                                <textarea id="Description" name="pdescription" placeholder="Enter Description" required></textarea>
                                <spam id="desc_error" style="color: red;"></spam>
                            </div>

                            <div class="form-field">
                                <input type="submit" name="btnsave" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/property.js" type="text/javascript"></script>
</body>

</html>