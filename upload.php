<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control_inventario";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$src = $_FILES['file']['tmp_name'];
$targ = "img/".$_FILES['file']['name'];
move_uploaded_file($src, $targ);

?> 