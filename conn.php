<?php

$sname= "127.0.0.1";

$unmae= "root";

$password = "";

$db_name = "control_inventario";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "La conexión ha fallado";

}
?>
