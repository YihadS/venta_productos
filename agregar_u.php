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


if (isset($_POST['nombre_u']) && isset($_POST['user'])) {

  function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $nombre_u = validate($_POST['nombre_u']);
    $user = validate($_POST['user']);


$sql = "INSERT INTO usuarios (username, password) VALUES ('$nombre_u', '$user')";

if ($conn->query($sql) === TRUE) {
  sleep(4);
header("Location: dashboard.php");
} else {
  echo "Error updating record: " . $conn->error;
}
}
$conn->close();
?>