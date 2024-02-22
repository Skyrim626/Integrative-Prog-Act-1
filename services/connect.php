
<?php
$serverName = "localhost";
$db_username = "root";
$password = "";
$databaseName = "activity_1";

$conn = mysqli_connect($serverName, $db_username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
