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

if (isset($_POST['u_seleccion']) && isset($_POST['cantidad']) && isset($_POST['fecha']) ) {
  function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }
    $producto = validate($_POST['u_seleccion']);
    $cantidad= validate($_POST['cantidad']);
    $fecha= validate($_POST['fecha']);

$sql = "UPDATE productos SET cantidad = cantidad -'$cantidad' WHERE nombre ='$producto'";
$sql2 = "INSERT INTO ventas (producto, cantidad, fecha) VALUES ('$producto', '$cantidad', '$fecha')";

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