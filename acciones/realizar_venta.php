<?php
    $matricula = $_REQUEST['matricula'];

    include "../conexion.php";

        $sql = "SELECT * FROM User WHERE matricula='$matricula'";
        
        $result = $mysqli->query($sql);
        $num = $result->num_rows;

        if($num > 0){
            $row = $result->fetch_assoc();

            $nombre = $row['nombre'];
            $apellidos = $row['apellidos'];
            $nombre_completo = $nombre. " " . $apellidos;            
            $foto = base64_encode($fotoperfil = $row['fotoperfil']);

            $mensaje = "Con datos";
        }else{
            $mensaje = "Sin datos";
        }

    $time = time();

    if($_POST){
        $mat_vendedor = $matricula;
        $desc_venta = $_POST['descripcion'];
        $no_personas = $_POST['noPersonas'];
        $id_servicio = $_POST['clave_servicio'];
        $horario = $_POST['horario'];
        $costo = $_POST['costo'];

        $sql = "INSERT INTO `historial_ventas` (`id_venta`, `desc_venta`, `no_personas`, `id_servicio`, `costo`, `fecha_registrada`, `fecha_actualizacion`, `mat_vendedor`, `horario`) VALUES (NULL, '$desc_venta', '$no_personas', '$id_servicio', '$costo', current_timestamp(), current_timestamp(), '$mat_vendedor', '$horario')";

        
        if ($mysqli->query($sql)) {
            echo "Venta Realizada!";
            header("Location: ../dashboard.php");
        } else {
                echo "Error: " . $sql . "<br>";
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

    <title>VIVE - Tablero</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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
                        <a class="collapse-item" href="register.html">Misión</a>
                        <a class="collapse-item" href="forgot-password.html">¿Olvidaste tu Contraseña?</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
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
                           

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $nombre_completo; ?></span>
                                <?php                             
                                $foto = base64_encode($fotoperfil);
                                    if($fotoperfil ==null){
                                        echo '<img class="img-profile rounded-circle"
                                        src="../img/user.png">
                                        ';
                                    }else if ($fotoperfil != null){
                                        echo '<img class="img-profile rounded-circle"
                                        src="data:image/png;base64, '.$foto .'">
                                        ';
                                    }
                            ?>   
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./perfil.php">
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
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hola! <strong> <?php echo $nombre_completo; ?> </strong></h1>
                        
                    </div>

                    <br>
                    <br>
                    <br>


                    <form action="#" method="POST" enctype="multipart/form-data">
                           
                            
                        <div class="input-group mb-4">
                                <span class="input-group-text">Servicio</span>
                                <input name="clave_servicio" id="clave_servicio" type="text" class="form-control" placeholder="213" required>
                        </div>
                        
                        <div class="form-group col-md-13">
                                    <label for="inputDesc">Descripción de la venta.</label>
                                    <textarea name="descripcion" id="descripcion" rows="3" cols="300" class="form-control" required></textarea>
                                </div>

                        <br>
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputHorario">Horario</label>
                                    <select name="horario" id="inputHorario" class="form-control" required>
                                        <option selected>Selecciona una opcion</option>
                                        <option>01:00:00 PM</option>
                                        <option>02:00:00 PM</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">                                
                                <label for="inputPersonas">No. Personas</label>
                                    <input name="noPersonas" type="number" class="form-control" id="inputPersonas" placeholder="1,2,3..." value="<?php echo $curp?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCosto">Costo</label>
                                <input name="costo" type="number" class="form-control" id="inputCosto" placeholder="0000" value="<?php echo $direccion?>" required> 
                            </div>
                        </div>           

                        <button type="submit" class="btn btn-primary col-md-3">
                                       Realizar Venta
                        </button>
                        </form>
                        <br>
                        <br>
            </div>
            <!-- End of Main Content -->

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
                    <h5 class="modal-title" id="exampleModalLabel">¿Estas Seguro de Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona Salir para Cerrar tu Sesión o Cancelar para abortar.</div>
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