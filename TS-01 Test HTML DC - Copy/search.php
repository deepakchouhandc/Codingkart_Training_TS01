<?php
session_start();
require_once 'database/dbconnection.php';
// Check  user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: loginhtml.php");
    exit();
}


$search_location = "";
$search_price_min = "";
$search_price_max = "";
$search_name = "";
$search_type = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $search_name = $_POST['pname'];
    $search_location = $_POST['plocation'];
    $search_price_min = $_POST['miniprice'];
    $search_price_max = $_POST['maxprice'];
    $search_type = $_POST['ptype'];


    $sql = "SELECT * FROM addproperty WHERE pname LIKE '%$search_name%' AND plocation LIKE '%$search_location%'";


    if (!empty($search_type)) {
        $sql .= " AND ptype = '$search_type'";
    } else {

        $sql .= " AND (ptype = 'rent' OR ptype = 'sell')";
    }
    // min price
    if (!empty($search_price_min)) {
        $sql .= " AND pprice >= '$search_price_min'";
    }
    //max pric
    if (!empty($search_price_max)) {
        $sql .= " AND pprice <= '$search_price_max'";
    }


    // $result = $conn->query($sql);
    $result = mysqli_query($conn, $sql);
}

// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Search</title>
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
                                <li><a href="property.php">Add Property</a></li>
                                <li><a href="property-list.php">List Property</a></li>
                                <li><a href="search-page.php" class="active">Search Property</a></li>
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


    <?php
    if (mysqli_num_rows($result) > 0) {
        // Display search results
        // echo "<h3>Search Results:</h3>";
        // echo "<table>";
        // echo "<tr><th>Title</th><th>Description</th><th>Location</th><th>Price</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {

    ?>
            <!-- ----------------------------------------------------------------------------------------------------------------------- -->

            <section class="main-content paddnig80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-width">
                                <h2>Search Property</h2>

                                <div class="product-list">
                                    <img src="<?php echo $row['pimage']; ?>" alt="home" class="property-img" width="120px" height="147px">
                                    <ul>

                                        <li><img src="images/icon-user.png" alt="user"><strong>Property Name: </strong><?php echo $row['pname']  ?></li>
                                        <li><img src="images/icon-home.png" alt="home"><strong>Property Type: </strong><?php echo $row['ptype']  ?></li>
                                        <li><img src="images/icon-doller.png" alt="doller"><strong>Price: </strong><?php echo "₹ " . $row['pprice']  ?></li>
                                        <li><img src="images/icon-location.png" alt="location"><strong>Location: </strong><?php echo $row['plocation']  ?></li>
                                    </ul>

                                    <li><strong>About Property : </strong></li>
                                    <p><?php echo $row['pdescription']  ?></p>

                                </div>


            </section>

            <!-- =============================================================================================================================== -->




            <!-- // echo "<tr>";
        // echo "<td>" . $row['pname'] . "</td>";
        // echo "<td>" . $row['ptype'] . "</td>";
        // echo "<td>" . $row['pprice'] . "</td>";
        // echo "<a href=".$row['pimage']."></a>";
        // echo "<td>" . $row['plocation'] . "</td>"; 
        // echo "<td>" . $row['pdescription'] . "</td>";
        // echo "</tr>"; -->
        <?php } ?>


    <?php } elseif (isset($result) && $result->num_rows == 0) {
        // echo $sql;
        echo "<h2>No properties found matching the search criteria.</h2>";
    }
    ?>


</body>
<script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>

</html>