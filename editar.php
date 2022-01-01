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

if (isset($_POST['u_seleccion2']) && isset($_POST['stock']) || isset($_POST['u_seleccion2']) && isset($_POST['image_upload2'])) {

  function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }
    $producto = validate($_POST['u_seleccion2']);
    $stock= validate($_POST['stock']);
    $img = validate($_POST['image_upload2']);

if (empty($_POST['image_upload2'])) {
$sql = "UPDATE productos SET cantidad = cantidad + '$stock' WHERE nombre ='$producto'";
$sql2 = "UPDATE productos SET imagen = imagen WHERE nombre ='$producto'";
}

else{
$sql = "UPDATE productos SET cantidad = cantidad + '$stock' WHERE nombre ='$producto'";
$sql2 = "UPDATE productos SET imagen = '$img' WHERE nombre ='$producto'";
}

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
sleep(4);
header("Location: dashboard.php");
} 
else {
  echo "Error updating record: " . $conn->error;
}
}


$conn->close();
?>