<?php 

session_start(); 

include "conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) ) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);


    
    if (empty($uname)) {

        header("Location: index.php?error=No puede dejar vacío el nombre");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=No puede dejar vacía la contraseña");

        exit();

    }else{

        $sql = "SELECT * FROM usuarios WHERE username='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);


            if ($row['username'] === $uname && $row['password'] === $pass) {

                echo "¡Has Ingresado!";

                $_SESSION['username'] = $row['username'];

                $_SESSION['id'] = $row['id'];
                 
                $_SESSION['dinero'] = $row['dinero'];

                header("Location: dashboard.php");

                exit();

            }else{

                header("Location: index.php?error=Nombre de Usuario o Contraseña incorrecta");

                exit();

            }

        }else{

            header("Location: index.php?error=Nombre de Usuario o Contraseña incorrecta");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}