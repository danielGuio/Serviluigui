<?php
include '../coneccion/Conexion.php';
$con = conectar();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$direccion = $_POST["direccion"];
$telCelular = $_POST["telefonoCel"];
$tipoElect = $_POST["tipoElectro"];
$marcaElect = $_POST["marcaElectro"];
$tipoServ = $_POST["tiposervicio"];
$danio = $_POST["observaciones"];
$idtipoServ = 0;
$idUsuario = "";
$idelectro = "";

if ($tipoServ == "Mantenimiento") {
    $idtipoServ = 1;
} elseif ($tipoServ == "Reparacion") {
    $idtipoServ = 2;
} elseif ($tipoServ == "Garantia") {
    $idtipoServ = 3;
}

//verificacion de si el usuario(correo existe en la base de datos)
function consultarusu($email, $con) {
    $consultarUsu = "select * from usuario where correo_electronico = '$email'";
    $resultadoConsulUsu = mysqli_query($con, $consultarUsu);
    $inforecibidaUsu = mysqli_fetch_assoc($resultadoConsulUsu);
    return $inforecibidaUsu;
}

function insertusu($nombre, $apellido, $direccion, $telCelular, $email, $con) {
    $insertarUsu = "insert into usuario(nombre, apellido, direccion, telefono_fijo, 
                telefono_celular,correo_electronico,clave, idrolUsuario)values(
                '$nombre','$apellido','$direccion','','$telCelular','$email','$telCelular',1)";

    $resultInsertUsu = mysqli_query($con, $insertarUsu);

    if ($resultInsertUsu) {
        echo ' insertado el usuario correctamente';
    } else {
        echo ' no se inserto el usuario en la base de datos';
    }
}

function consultElectr($tipoElect, $marcaElect, $idUsuario, $con) {
    $consultarElect = "SELECT * FROM electrodomesticos where tipo_electro = '$tipoElect' "
            . "and marca = '$marcaElect' and idUsuario='$idUsuario'";
    $resultadoConsulElect = mysqli_query($con, $consultarElect);
    $inforecibidaElec = mysqli_fetch_assoc($resultadoConsulElect);
    return $inforecibidaElec;
}

function insertElectr($tipoElect, $marcaElect, $idUsuario, $con) {
    $insertarElectro = "insert into electrodomesticos(tipo_electro, marca, observaciones, idUsuario)values(
                   '$tipoElect','$marcaElect','','$idUsuario')";
    $resultInsertElect = mysqli_query($con, $insertarElectro);

    if ($resultInsertElect) {
        echo ' insertado el electrodomestico correctamente ';
    } else {
        echo ' no se inserto el electerodomestico en la base de datos ';
    }
}

function insertServicio($direccion, $telCelular, $danio, $idtipoServ, $idelectro, $con) {
    $insertarServicio = "insert servicios(direccionservicio, telservicio, fechaProgramadoServicio, horaPorgramadoServicio, 
        valorcobrado, fecha_finalizacion_serv, danio_presentado, observaciones, idestadoservicio, idtiposervicio, 
        idelectrodomesticos) Values('$direccion', '$telCelular', '2010-05-05', '', '', '', '$danio', '', '1',"
            . "'$idtipoServ', '$idelectro')";

    $resultInsertServ = mysqli_query($con, $insertarServicio);
    if ($resultInsertServ) {
        echo ' insertado el servicio correctamente';
    } else {
        echo ' no se inserto el servicio en la base de datos';
    }
}

function validarsesion($idUsuario, $usuario, $nombre, $apellido) {
    if (isset($_session)) {
    } else {
        session_start();
        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['nombre']=$nombre;
        $_SESSION['tipousu'] = 1;
    }
}

$inforecibidaUsu = consultarusu($email, $con);
if ($inforecibidaUsu == null) {//valida si el usuario existe 
    insertusu($nombre, $apellido, $direccion, $telCelular, $email, $con);
    $inforecibidaUsu2 = consultarusu($email, $con);
    $idUsuario = $inforecibidaUsu2['idUsuario'];
    insertElectr($tipoElect, $marcaElect, $idUsuario, $con);
    $inforecibidaElec = consultElectr($tipoElect, $marcaElect, $idUsuario, $con);
    $idElect = $inforecibidaElec['idelectrodomesticos'];
    insertServicio($direccion, $telCelular, $danio, $idtipoServ, $idElect, $con);
    validarsesion($idUsuario, $email, $nombre, $apellido);
    echo "<script>window.location = '../usuario.php'</Script>";
} else {
    $idUsuario = $inforecibidaUsu['idUsuario'];
    $inforecibidaElec = consultElectr($tipoElect, $marcaElect, $idUsuario, $con);
    if ($inforecibidaElec == null) {
        insertElectr($tipoElect, $marcaElect, $idUsuario, $con);
        $inforecibidaElec = consultElectr($tipoElect, $marcaElect, $idUsuario, $con);
        $idElect = $inforecibidaElec['idelectrodomesticos'];
        echo 'el id del electrodomestico creado es: ' . $idElect;
        insertServicio($direccion, $telCelular, $danio, $idtipoServ, $idElect, $con);
        validarsesion($idUsuario, $email, $nombre, $apellido);
        echo "<script>window.location = '../usuario.php'</Script>";
    } else {
        $idElect = $inforecibidaElec['idelectrodomesticos'];
        insertServicio($direccion, $telCelular, $danio, $idtipoServ, $idElect, $con);
        validarsesion($idUsuario, $email, $nombre, $apellido);
        echo "<script>window.location = '../usuario.php'</Script>";
    }
}      
    