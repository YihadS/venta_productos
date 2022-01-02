<?php

$sname= "localhost";

$uname= "root";

$password = "";

$db_name = "control_inventario";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {

    echo "La conexión ha fallado";

}
