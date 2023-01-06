<?php

include '../coneccion/Conexion.php';
$con = conectar();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$direccion = $_POST["direccion"];
$telfijo = $_POST["tel_fijo"];
$telCelular = $_POST["tel_cel"];
$clave = $_POST["claveRegistro"];
$idUsuario = "";
$usuario = "";


function insertusu($nombre, $apellido, $direccion, $telCelular, $email, $telfijo, $con) {
    $insertarUsu = "insert into usuario(nombre, apellido, direccion, telefono_fijo, 
                telefono_celular,correo_electronico,clave, idrolUsuario)values(
                '$nombre','$apellido','$direccion','','$telfijo','$email','$telCelular',1)";
    $resultInsertUsu = mysqli_query($con, $insertarUsu);

    if ($resultInsertUsu) {
    } else {
    }
}

function validarsesion($idUsuario, $usuario, $nombre, $apellido) {
    if (isset($_SESSION['usuario'])) {
        session_destroy();
        session_start();
        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['nombre']=$nombre;
        $_SESSION['tipousu'] = 1;
    } else {
        session_start();
        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['nombre']=$nombre;
        $_SESSION['tipousu'] = 1;
    }
}

function consultarusu($email, $con) {
    $consultarUsu = "select * from usuario where correo_electronico = '$email'";
    $resultadoConsulUsu = mysqli_query($con, $consultarUsu);
    $inforecibidaUsu = mysqli_fetch_assoc($resultadoConsulUsu);
    return $inforecibidaUsu;
}


$inforecibidaUsu = consultarusu($email, $con);
if ($inforecibidaUsu == null) {
    insertusu($nombre, $apellido, $direccion, $telCelular, $email,$telfijo, $con);
    $inforecibidaUsu2 = consultarusu($email, $con);
    if (!$inforecibidaUsu2) {
        echo "<script> alert('Error al registrar el usuario en la base de datos');";
    } else {
        $idUsuario = $inforecibidaUsu2['idUsuario'];
        $usuario = $inforecibidaUsu2['correo_electronico'];
        validarsesion($idUsuario, $usuario, $nombre, $apellido);
        echo "<script> alert('Registro de usuario exitoso');"
    . "window.location = '../usuario.php'</Script>";
    }
} else {
    echo "<script> alert('El email usado ya se encuentra registrado en nuestro sistema');"
    . "window.location = '../registrarse.php'</Script>";
}
//cerrando coneccion
mysqli_close($con);

