<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title></title>
</head>
<body>

<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" action="conexion.php" method="post">

            <div class="text-center">
              <img src="img/usuario.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>
             
<?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>

            <div class="mb-3">
              <input type="text" class="form-control" id="uname" aria-describedby="emailHelp"
                placeholder="Nombre de Usuario" name="uname">
            </div>
            <div class="mb-3">
              <input type="Contraseña" class="form-control" id="password" placeholder="password" name="password">
            </div>
            <div class="text-center"><button  id= "submit_btn" type="submit" class="btn btn-color px-5 mb-5 w-100">Acceder</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">¿Aún no estás registrado? <a href="#" class="text-dark fw-bold"> Crea una cuenta</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

	<div class="credenciales">
		<h1> Usuario: admin </h1>
		<h1> Contraseña: pass123 </h1>
	</div>
<script src="function.js"></script>
</body>
</html>
