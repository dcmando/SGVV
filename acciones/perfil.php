<?php 
    include "../conexion.php";
    session_start();
    $matricula = $_SESSION['matricula'];

        $sql = "SELECT * FROM User WHERE matricula='$matricula'";
        
        $result = $mysqli->query($sql);
        $num = $result->num_rows;

        if($num > 0){
            $row = $result->fetch_assoc();

            $nombre = $row['nombre'];
            $apellidos = $row['apellidos'];
            $nombre_completo = $nombre. " " . $apellidos; 
            $genero = $row['genero'];
            $curp = $row['curp'];
            $direccion = $row['direccion'];
            $telefono = $row['telefono'];
            $rol = $row['rol'];
            $foto = base64_encode($fotoperfil = $row['fotoperfil']);
            $clave = $row['clave'];
            $usuario = $row['usuario'];

            if($genero == "H"){
                $genero = "Hombre";
            }else if($genero == "M"){
                $genero = "Mujer";
            }

            $mensaje = "Con datos";
        }else{
            $mensaje = "Sin datos";
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

    <title>VIVE - Perfil</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                
                <div class="sidebar-brand-text mx-3"> VIVE <sup>Servicios Turisticos</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tablero</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interfaz
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ventas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ventas:</h6>
                        <a class="collapse-item" href="buttons.html">Realizar Ventas</a>
                        <a class="collapse-item" href="cards.html">Historial de Ventas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Acciones</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones:</h6>
                        <a class="collapse-item" href="utilities-color.html">Agregar Usuarios</a>
                        <a class="collapse-item" href="utilities-border.html">Agregar Servicios</a>
                        <a class="collapse-item" href="utilities-animation.html">Activar Oferta</a>
                        <a class="collapse-item" href="utilities-other.html">Registrar Horario</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Complementos
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Paginas</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Nosotros:</h6>
                        <a class="collapse-item" href="login.html">Acerca de</a>
                        <a class="collapse-item" href="register.html">Misi??n</a>
                        <a class="collapse-item" href="forgot-password.html">??Olvidaste tu Contrase??a?</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Redes Sociales:</h6>
                        <a class="collapse-item" href="404.html">Facebook</a>
                        <a class="collapse-item" href="blank.html">Instagram</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $nombre_completo; ?></span>
                                <?php                            
                                if($foto ==null){
                                    echo '<img class="img-profile rounded-circle"
                                    src="../img/user.png">
                                    ';
                                }else if ($foto != null){
                                    echo '<img class="img-profile rounded-circle"
                                    src="data:image/png;base64, '.$foto .'">
                                    ';
                                }
                            ?>   
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuraciones
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesi??n
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                            
                 <?php
                    //   if ($GLOBALS["mensajeUpdate"] == 1) {
                    //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    //     <strong>"'. $nombre .'"</strong>  Completaste tu informaci??n!.
                    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //       <span aria-hidden="true">&times;</span>
                    //     </button>
                    //   </div>' ;
                    // } else if($GLOBALS["mensajeUpdate"] == 0){
                    //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    //     <strong>"'. $nombre .'"</strong>  Algo Salio Mal!. '. $sql .'
                    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //       <span aria-hidden="true">&times;</span>
                    //     </button>
                    //   </div>' ;
                    // }
                ?> 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <?php                          
                        if($row['fotoperfil'] == null){
                            echo '<h1 class="h3 mb-0 text-gray-800">Estas completando tu perfil '  . $nombre_completo . '</h1>';
                        } else {
                            echo '<h1 class="h3 mb-0 text-gray-800">Tu perfil ' . '<strong>' . $nombre_completo . '</strong></h1>' ;
                        }
                        ?>
                        <a href="./realizar_venta.php?matricula= <?php echo $matricula?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-cash-register fa-sm text-white-50"></i> Generar Venta</a>
                    </div>

                  <main>
                    <div class="container bg-light">
                        <!-- Forms of the user profile -->
                        <form action="./update_profile.php?matricula=<?php echo $matricula?>" method="POST" enctype="multipart/form-data">
                            <center>
                            <div class="card" style="width:500px">                       
                            <?php
                                if($foto ==null){
                                    
                                    echo '<center><img class="card-img-top rounded" style="width:200px; height: auto;  border-radius: 100% !important; margin: 10px;" src="../img/user.png" alt="image"></center>
                                    <div class="card-body">
                                        <input name="foto" type="file" alt="user" name="fotodeperfil">Seleccionar foto.</input>
                                    </div>
                                    ';
                                }else if ($foto != null){
                                    echo '<center><img class="card-img-top rounded" style="width:200px; height: auto; border-radius: 100% !important; margin: 10px;" src="data:image/png;base64,'. $foto .'"  alt="no_tienes_foto_de_perfil"></center> 
                                    <div class="card-body">
                                        <input name="foto" type="file" alt="user" name="fotodeperfil">Cambiar Foto</input>
                                    </div>
                                    ';
                                }
                            ?>                           
                            </div>
                            </center>
                            </br>
                            <label for="mat">Esta es tu matr??cula. <sub class="text-danger">Es unica y no se puede modificar!</sub></label>
                            <input type="text" class="form-control" style="width: 30%;" disabled value="<?php echo $matricula?>">
                            <br>
                        <div class="input-group mb-3">
                                <span class="input-group-text">Nombre Completo/User</span>
                                <input name="nombre" id="nombre" type="text" class="form-control" value="<?php echo $nombre?>" required>
                                <input name="apellidos" id="apellidos" type="text" class="form-control" value="<?php echo $apellidos?>" required>
                                <input name="user" id="user" type="text" class="form-control" value="<?php echo $usuario?>" required>
                        </div>
                        <br>
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputGenero">Genero</label>
                                    <select name="genero" id="inputGenero" class="form-control" required>
                                        <option selected><?php echo $genero?></option>
                                        <option>Hombre</option>
                                        <option>Mujer</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">                                
                                <label for="inputCurp">CURP</label>
                                    <input name="curp" type="text" class="form-control" id="inputCurp" placeholder="EJEMPLO2991921AP" value="<?php echo $curp?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputaddress">Direcci??n</label>
                                <input name="direccion" type="text" class="form-control" id="inputaddress" placeholder="Calle de Ejemplo" value="<?php echo $direccion?>" required> 
                            </div>
                        </div>     
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputGenero">Rol de Trabajador</label>
                                    <select name="rol_trabajador" id="inputGenero" class="form-control" required>
                                        <option selected><?php echo $rol?></option>
                                        <option>Gu??a</option>
                                        <option>Promotor</option>
                                        <option>Gu??a/Promotor</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">                                
                                <label for="inputCurp">Telefono</label>
                                    <input name="telefono" type="text" class="form-control" id="inputCurp" placeholder="###-###-####" value="<?php echo $telefono?>" required>
                                </div>
                               
                                    <div class="form-group col-md-4">
                                    <label for="inputaddress">Clave de Acceso</label>
                                    <br> 
                                    <a href="./recover_password.php" class="btn btn-primary form-group col-md-12">Cambiar Clave</a>
                                    </div>
                        </div>                                                  

                        <button type="submit" class="btn btn-success col-md-3">
                                        Guardar Cambios
                        </button>
                        </form>
                        <div class="separador"></div>
                    </div>

                  </main>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Asicom Graphics 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">??Estas Seguro de Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona Salir para Cerrar tu Sesi??n o Cancelar para abortar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>