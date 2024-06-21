<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = 'crud';
$port_number = 3307;

// Enable exception handling for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_connect($servername, $username, $password, $database_name, $port_number);
    // ... rest of your code
} catch (mysqli_sql_exception $exception) {
    // Log the actual error message somewhere, like an error log file
    error_log($exception->getMessage());
    // Use JavaScript to display an alert popup with a user-friendly message
    echo "<script type='text/javascript'>alert('We are experiencing technical difficulties. Please try again later.');
    window.location.href = 'signup.html'
    </script>";
    exit; // Stop script execution if connection fails
}
?>
