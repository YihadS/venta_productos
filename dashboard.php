<?php 

session_start();

if ( isset($_SESSION['username'])) {

 ?>

<?php
//comando para depositar dinero

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "control_inventario";


$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query = "SELECT nombre, precio FROM `productos`";


$result2 = mysqli_query($connect, $query);

$options = "";
$options2 = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[0] </option>";
}
//final de comando para depositar dinero
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="section">
		<div class="row2">
	<center><h1> Bienvenido, <?php echo $_SESSION['username']; ?> </h1></center>
	<center><img src="img/usuario.png" id="imagen"></center>
	<div class="buttons">
    <button id="usuarios"> Agregar Usuarios</button>
	<button id="editar"> Editar Productos</button>
	<button id="agregar"> Agregar Productos</button>
	<button id="vender"> Vender Productos</button>
	<button id="cerrar"><a href="logout.php" style="color: white;"> Cerrar Sesión </a></button>
	</div>
		</div>

		<div class="row2">
 <table id="customers">
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Cantidad</th>
  </tr>
  <tr>
    <?php
$conn = mysqli_connect("localhost", "root", "", "control_inventario");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT imagen, nombre, precio, cantidad FROM productos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . "<img id='pr_img' src=","img/". $row["imagen"].">". "</td><td>" . $row["nombre"] . "</td><td>"
. $row["precio"] . " Bs". "</td><td>" . $row["cantidad"]. " unidades". "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>

<center><h1 class="h1_ventas"> Últimas Ventas </h1></center>
<table id="ventas">
  <tr>
    <th>Id</th>
    <th>Producto</th>
    <th>Cantidad</th>
    <th>Fecha</th>
  </tr>
  <tr>
    <?php
$conn = mysqli_connect("localhost", "root", "", "control_inventario");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, producto, cantidad, fecha FROM ventas";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" .  $row["id"]. "</td><td>" . $row["producto"] . "</td><td>"
. $row["cantidad"] . " unidades". "</td><td>" . $row["fecha"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>

	</div>
	</div>

<div class="editar">
	<h1> Selecciona un producto </h1>
    <form class="agregar_p" action= "editar.php" method="post">
	  <select id="u_select2" name="u_seleccion2">
            <?php echo $options;?>
          </select>
    <h2> Añadir Stock</h2>
    <input  type="number" name="stock" placeholder="Indique la cantidad que desea añadir" min="1">
    <h2> Cambiar Imagen</h2>
    <input  class="hidden" type="file" name="image_upload2" id="image_upload2">
    <div class="botones"> 
    <input type="submit" id="aceptar" value="Modificar Producto" name="submit">
	<button id="cerrar2">Cerrar</button>
    </form>
    </div>
</div>

<div class="agregar">
	<h1> Datos del Producto</h1>
	<form class="agregar_p" action= "agregar.php" method="post">
		 <input  class="monto" type="text" name="nombre" placeholder="Agregue el nombre del producto">
		 <input  class="monto" type="number" name="precio" id="precio" placeholder="Agregue el precio del producto" min="1">
		 <input  class="monto" type="number" name="cantidad" placeholder="Agregue la cantidad del producto" min="1">
		 <input  class="hidden" type="file" name="image_upload" id="image_upload">
		 <input type="submit" id="btn_agregar" value="Ingresar Producto" name="submit">
	</form>
	<button id="cerrar3">Cerrar</button>
</div>

<div class="usuario">
    <h1> Agregar Usuario</h1>
    <form class="usuario_p" action= "agregar_u.php" method="post">
         <input  class="monto" type="text" name="nombre_u" placeholder="Agregue el nombre del Usuario">
         <input  class="monto" type="text" name="user" placeholder="Escriba una contraseña">
         <input type="submit" id="btn_user" value="Ingresar Usuario" name="submit">
    </form>
    <button id="cerrar5">Cerrar</button>
</div>

<div class="vender">
  <h1 id="vender"> Vender Productos</h1>
  <form class="vender_p" action= "vender.php" method="post">
    <h3> Escoja el producto</h3>
    <select id="u_select" name="u_seleccion">
            <?php echo $options;?>
          </select>
     <input  class="monto" type="number" name="cantidad" id="cantidad" placeholder="Agregue la cantidad del producto" min="1">
     <input type="date" name="fecha" id="fecha" />
     <input type="submit" id="btn_vender" value="Realizar Venta" name="submit">
  </form>
  <button id="cerrar4">Cerrar</button>
</div>

<div id="page_mask">
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="function.js"></script>
<script>
  $(document).ready(function() {
    $('#image_upload').change(function(){
        var file_data = $('#image_upload').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                console.log(data);
            }
        });
    });
});
</script>

<script>
  $(document).ready(function() {
    $('#image_upload2').change(function(){
        var file_data = $('#image_upload2').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                console.log(data);
            }
        });
    });
});
</script>
</body>
</html>
<?php 

}else{

     header("Location: index.php");

     exit();

}
 ?>

 
