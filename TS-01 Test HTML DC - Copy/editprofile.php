<div id="main-content">
  <!-- profile edit html page go to updatedata.php -->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    h2 {
      padding: 10px 43%;
    }

    .post-form {
      max-width: 500px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      /* Lighter shade for a fresher look */
      border: 1px solid #e1e1e1;
      /* Border added for definition */
      border-radius: 10px;
      /* Slightly larger radius for a softer edge */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      /* Subtle shadow for depth */
    }

    .form-group {
      margin-bottom: 20px;
      /* Increased spacing for better visual separation */
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      /* Increased spacing for label */
      font-size: 16px;
      /* Larger font size for readability */
      color: #333;
      /* Darker font color for better contrast */
    }

    .form-group input[type="text"],
    .form-group input[type="file"] {
      width: 100%;
      padding: 12px;
      /* Slightly larger padding for a better touch area */
      border: 1px solid #ccc;
      /* Lighter border color */
      border-radius: 5px;
      /* Smaller radius for a modern look */
      box-sizing: border-box;
      transition: border-color 0.3s;
      /* Smooth transition for interactions */
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
      background-color: #333131;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .dash{
      display:inline-block;
      text-align: center;
      width: 93%;
      background-color: #333131;
      color: white;
      padding: 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
  <h2>Update Record</h2>

  <?php


  session_start();
  require_once 'database/dbconnection.php';
  $insert = "select * from signup where email='{$_SESSION['email']}'";
  // $update = "update student set firstname = '{$firstname}', lastname = '{$lastaddress}',phone='{$phone}', address = '{$address}' where email= '{$_SESSION['username']}'";
  $result = mysqli_query($conn, $insert) or die("Query Unsuccessful");

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

      // print_r($row);

  ?>


      <form class="post-form" action="updatedata.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>First Name</label>
          <input type="hidden" name="email" value="<?php echo $row['email'] ?>" />
          <input type="text" name="firstname" value="<?php echo $row['firstname'] ?>" />
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="lastname" value="<?php echo $row['lastname'] ?>" />
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" name="phone" value="<?php echo $row['phone'] ?>" />
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" name="address" value="<?php echo $row['address'] ?>" />
        </div>
        <div class="form-group">
          <label>Image</label>
          <input type="file" name="edit_image" />
        </div>
        <input class="submit" type="submit" value="Update" /><br>
        <div>
          <a href="dashboard.php" class="dash">Back TO Dashboard</a>
        </div>
      </form>

  <?php
    }
  }
  ?>

</div>
</div>
</body>

</html>