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


if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['cantidad']) && isset($_POST['image_upload'])) {

  function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $nombre = validate($_POST['nombre']);
    $precio = validate($_POST['precio']);
    $cantidad = validate($_POST['cantidad']);
    $image_upload = validate($_POST['image_upload']);


$sql = "INSERT INTO productos (nombre, cantidad, precio, imagen) VALUES ('$nombre', '$cantidad', '$precio', '$image_upload')";

if ($conn->query($sql) === TRUE) {
  sleep(4);
header("Location: dashboard.php");
} else {
  echo "Error updating record: " . $conn->error;
}
}
$conn->close();
?>