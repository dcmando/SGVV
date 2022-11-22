<?php

include "../conexion.php";

$matricula = $_REQUEST['matricula'];

if($_POST){
    $nombreUpdate = $_POST['nombre'];
    $apellidosUpdate = $_POST['apellidos'];
    $generoUpdate = $_POST['genero'];
    $curpUpdate = $_POST['curp'];
    $direccionUpdate = $_POST['direccion'];
    $telefonoUpdate = $_POST['telefono'];
    $rolUpdate = $_POST['rol_trabajador'];
    $fotoperfilUpdate = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $usuarioUpdate = $_POST['user'];         
   
    if($generoUpdate == "Hombre"){
        $generoUpdate = "H";
    } else if ($generoUpdate == "Mujer"){
        $generoUpdate = "M";
    }

    $sql = "UPDATE user 
    set 
    nombre = '$nombreUpdate',
    apellidos = '$apellidosUpdate',
    genero = '$generoUpdate',
    curp = '$curpUpdate',
    direccion = '$direccionUpdate',
    telefono = '$telefonoUpdate',
    rol = '$rolUpdate',
    fotoperfil = '$fotoperfilUpdate',
    usuario = '$usuarioUpdate'
    WHERE matricula = $matricula;
    ";

    $result = $mysqli->query($sql);

    if($result){
        header("Location: perfil.php");
        $mensajeUpdate = 1;
    }else {
        $mensajeUpdate = 0;
        echo "No se inserto" . $sql;
    }
}
    
   
?>