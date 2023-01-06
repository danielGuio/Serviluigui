<?php
include '../coneccion/Conexion.php';
$con = conectar();

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$consultaUsuario = "select * from usuario where correo_electronico = '$usuario'";
$result = mysqli_query($con, $consultaUsuario);
$usuarray = mysqli_fetch_array($result);

// en este caso devuelve 0 si no esta el usuario en la bd, 1 si esta el usuario pero no la contraseña
//2 si estan los dos y es de tipo 1(cliente), 3 si estan los dos y es de tipo 2(admin)

if ($usuarray != null) {
    $idUsuariobd = $usuarray['idUsuario'];
    $usuariobd = $usuarray['correo_electronico'];
    $clavebd = $usuarray['clave'];
    $nombre = $usuarray['nombre'];
    $apellido = $usuarray['apellido'];
    $idtipoUsubd = $usuarray['idrolUsuario'];
    if ($clavebd == $clave) {
        if ($idtipoUsubd == 1){//comparacion para usuario tipo cliente
            session_start();
            $_SESSION['idUsuario'] = $idUsuariobd;
            $_SESSION['usuario'] = $usuariobd;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
           // $_SESSION['clave'] = $clavebd;
            $_SESSION['tipousu'] = 1;
            echo json_encode(array('success' =>2));
        }else if($idtipoUsubd == 2){//comparacion para usuario tipo administrador
            session_start();
            $_SESSION['idUsuario'] = $idUsuariobd;
            $_SESSION['usuario'] = $usuariobd;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
           // $_SESSION['clave'] = $clavebd;
            $_SESSION['tipousu'] = 2;
            echo json_encode(array('success' =>3));            
        }
    } else {
        echo json_encode(array('success' =>1));//cuando no existe la clave en la base de datos
    }
} else {
    echo json_encode(array('success' =>0));//cuando no existe el correo en la base de datos
}

