<div id="main-content">
  <?php
  // Property edit html page sent to updateproperty.php
  session_start();
  $getId = $_GET['id'];
  $_SESSION['id'] = $getId;

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
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
      }

      h2 {
        padding: 1px 40%;
      }

      .post-form {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;

        border: 1px solid #e1e1e1;

        border-radius: 10px;

        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

      }

      .form-group {
        margin-bottom: 20px;

      }

      .form-group label {
        display: block;
        margin-bottom: 8px;

        font-size: 16px;

        color: #333;

      }

      .form-group input[type="text"],
      .form-group input[type="file"] {
        width: 100%;
        padding: 12px;

        border: 1px solid #ccc;

        border-radius: 5px;

        box-sizing: border-box;
        transition: border-color 0.3s;

      }

      .form-group input[type="text"]:focus,
      .form-group input[type="file"]:focus {
        border-color: #5cb85c;
        /* Highlight color when focused */
      }

      .form-group input[type="submit"] {
        width: 100%;
        padding: 12px;
        /* Consistent padding with text inputs */
        border: none;
        border-radius: 5px;
        background: #4cae4c;
        /* Slightly darker for better accessibility */
        color: white;
        font-size: 18px;
        /* Larger font size for button text */
        cursor: pointer;
        transition: background-color 0.3s;
        /* Smooth background transition */
      }

      .form-group input[type="submit"]:hover,
      .form-group input[type="submit"]:focus {
        background: #449d44;
        /* Darker shade on hover/focus for feedback */
      }

      input[type="submit"] {
        width: 100%;
        background-color: #1f211f;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.5s all;
      }

      input[type="submit"]:hover {
        background-color: #4e504e;
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
                <li><a href="property.php">Add Property</a></li>
                <li><a href="property-list.php" class="active">List Property</a></li>
                <li><a href="search-page.php">Search Property</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php" class="logout" onclick="myFunction()">Logout</a></li>

              </ul>

              <a href="#" class="mobile-icon"><i class="fa fa-bars" aria-hidden="true"></i></a>

            </div>
          </div>
        </div>
      </div>
    </section>
  </body>

  </html>


  <?php
  // session_start();
  require_once 'database/dbconnection.php';
  $insert = "SELECT * FROM addproperty WHERE pid='{$_SESSION['id']}'";
  $result = mysqli_query($conn, $insert) or die("Query Unsuccessful");

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  ?>
    <div></div>
    <h2>UPDATE PROPERTY</h2>
    <form class="post-form" action="updateproperty.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Property Name</label>
        <input type="text" name="pname" value="<?php echo $row['pname']; ?>" />
      </div>
      <div class="form-group">
        <label>Property Type</label>
        <input type="text" name="ptype" value="<?php echo $row['ptype']; ?>" />
      </div>
      <div class="form-group">
        <label>Price</label>
        <input type="text" name="pprice" value="<?php echo $row['pprice']; ?>" />
      </div>
      <div class="form-group">
        <label>Property Location</label>
        <input type="text" name="plocation" value="<?php echo $row['plocation']; ?>" />
      </div>
      <div class="form-group">
        <label>Property Description</label>

        <textarea name="pdescription" rows="4" cols="50"><?php echo htmlspecialchars($row['pdescription']); ?></textarea>

      </div>
      <div class="form-group">
        <label>Property Image</label>
        <input type="file" name="peditimage" />
        <input type="hidden" name="existing_pimage" value="<?php echo $row['pimage']; ?>" />
      </div>
      <input class="submit" type="submit" value="Update" />
    </form>
  <?php
  }
  ?>


</div>
</div>
</body>

</html>