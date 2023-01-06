<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipousu']!=2) {
     echo "<script>alert('No tiene permiso para acceder a esta pagina')</script>";
    die();   
}
include '../coneccion/Conexion.php';
$con = conectar();
$idElectr = $_POST["idElect"];
$idServ = $_POST["idser"];
$observElectro = $_POST["observElectro"];
$fechaProgServ = $_POST["fechaProgServ"];
$horaProgServ = $_POST["horaProgServ"];
$valorCobrado = $_POST["valorCobrado"];
$danioPresentado = $_POST["danioPresentado"];
$estadoServ = $_POST["selectEstadoServ"];
$idEstadoServ = 0;

if ($estadoServ == "Recibido") {
    $idEstadoServ = 1;
} else if ($estadoServ == "Programado") {
    $idEstadoServ = 2;
} else if ($estadoServ == "Realizado") {
    $idEstadoServ = 3;
}

$actualizarObsElect = "update electrodomesticos set observaciones = '$observElectro' where idelectrodomesticos = '$idElectr'";
$actualizarServ = "update servicios set observaciones = '$observElectro', fechaProgramadoServicio = '$fechaProgServ',"
        . "horaPorgramadoServicio = '$horaProgServ', valorcobrado = '$valorCobrado', danio_presentado = '$danioPresentado',"
        . "idestadoservicio = '$idEstadoServ' where idservicios = '$idServ'";

//ejecutar consulta
$resultadoAct = mysqli_query($con, $actualizarServ);
$resultadoActElect = mysqli_query($con, $actualizarObsElect);

if (!$resultadoAct){
    echo "<script> alert('error al actualizar el servicio');
    window.location = '../administradorInicio.php'</Script>";
} else {
    if ($idEstadoServ == 1) {
        echo "<Script> alert('Actualizacion de servicio exitosa');
        window.location = '../admin_verServ_recibidos.php'</Script>";
    }else if ($idEstadoServ == 2) {
        echo "<Script> alert('Actualizacion de servicio exitosa');
        window.location = '../admin_verServ_Programado.php'</Script>";
    }else if ($idEstadoServ == 3) {
        echo "<Script> alert('Actualizacion de servicio exitosa');
        window.location = '../admin_verServ_Realizado.php'</Script>";
    }else{
        echo "<Script> alert('Actualizacion de servicio exitosa');
        window.location = '../administradorInicio.php'</Script>";
    }
}

//cerrando coneccion
mysqli_close($con);

