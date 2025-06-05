<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "crud";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "✅ Connection successful to database: $dbName";
?>
