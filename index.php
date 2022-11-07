<?php
    require "conexion.php";
    session_start();

    if($_POST){
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        $sql = "SELECT usuario, clave, nombre, rol, apellidos, fotoperfil FROM User WHERE usuario='$usuario'";
        
        $result = $mysqli->query($sql);
        $num = $result->num_rows;

        if($num > 0){
            $row = $result->fetch_assoc();
            $password_bd = $row['clave']; 
            
            
            $pass_c = sha1($clave);

            if($password_bd == $pass_c){
                $_SESSION['matricula'] = $row['matricula'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellidos'] = $row['apellidos'];
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['fotoperfil'] = $row['fotoperfil'];

                header("Location: dashboard.php");
            } else {
                echo "La contraseña no coincide";
            }

        } else {
            echo "No existe el usuario";
        }
    } 

    

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VIVE - Iniciar Sesión</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img style="position: absolute; left: 100px; top: 60px;" src="./img/logoSitz.png" alt="logo">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido a VIVE!</h1>
                                    </div>
                                    <form class="user" method="POST" action=" <?php  
                                        echo $_SERVER['PHP_SELF']; ?> ">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="usuario" aria-describedby="emailHelp"
                                                placeholder="Ingresa tu Usuario...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="clave" placeholder="Clave de Acceso">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Iniciar Sesión
                                        </button>
                                        <hr>
                                      
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">¡Crear Cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>