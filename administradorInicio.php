<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('No tiene permiso para acceder a esta pagina')</script>";
    die();
}
include './coneccion/Conexion.php';
$con = conectar();
$idUsuario = $_SESSION['idUsuario'];
$usuario = $_SESSION['usuario'];
$apellido = $_SESSION['apellido'];
$nombre = $_SESSION['nombre'];

$consultElec = "select idelectrodomesticos, tipo_electro, marca, observaciones from electrodomesticos
        inner join usuario on electrodomesticos.idUsuario = usuario.idUsuario where correo_electronico = '$usuario'";

$consutServ = "select tiposervicio, tipo_electro, marca, estadoservicio,  fechaProgramadoServicio, 
       direccionservicio, telservicio from servicios inner join tiposervicio on servicios.idtiposervicio = 
       tiposervicio.idtiposervicio inner join estadoservicio on servicios.idestadoservicio = estadoservicio.idestadoservicio
       inner join electrodomesticos on servicios.idelectrodomesticos = electrodomesticos.idelectrodomesticos inner join 
       usuario on usuario.idUsuario = electrodomesticos.idUsuario where correo_electronico = '$usuario'";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Soluciones para su hogar</title>
        <link rel="stylesheet" href="Style.css"/>
        <script src="https://kit.fontawesome.com/c74707d321.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header class="header">
            <div class="container logo-nav-container">
                <img src="Imagenes/Logo empresa3.png" alt="Logo empresa" class="logo"/>
                <span class="menu-icon">ver menu</span>
                <nav class="navigation">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="solicitarServ.php">Solicitar Servicio</a></li>
                        <li><a href="quienesSomos.php">Quienes somos</a></li>
                        <li><a href="Ingresar.php">Ingresar</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main">
            <div class="container-usuario">
                <a class="cerrarsesion" href="modelo/cerrarSesion.php">cerrar secion</a>
                <h1>Bienvenido(a) administrador <?php echo " " . $nombre . " " . $apellido; ?></h1>
                <br>
                <div class="container_opciones_admin">
                    <ul>
                        <li><a href="admin_verTodosUsuarios.php">Listado de usuarios registrados</a></li>
                        <li><a href="admin_verServ_recibidos.php">Servicios recibidos</a></li>
                        <li><a href="admin_verServ_Programado.php">Servicios programados</a></li>
                        <li><a href="admin_verServ_Realizado.php">Servicios realizados</a></li>
                    </ul>
                </div>

        </main>
        <footer class="footer">
            <div class="container">
                <div class="datos-Footer">
                    <p>
                        Contactenos
                    </p>
                    <p>
                        Telefono: 313-833-50-35
                    </p>
                    <p>
                        SolucionesParaSuHogar@gmail.com
                    </p>
                </div>
                <div class="contenedor-redes-sociales">
                    <ul>
                        <li><a href="https://www.facebook.com/daniel.guiorojas" class="facebook"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCcys_M2e0R782dp-bedr8cA" class="youtube"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>        
        </footer>
        <?php
        ?>
        <noscript>
            <p>Vienvenido, para hacer uso de esta pagina y
            sus opciones debe permitir el funsionamiento de javaScript, si lo deshabilito intencionalmente
            por favor habilitelo.
            </p>
	</noscript>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/Scripts.js"></script>
    </body>
</html>
