<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipousu'] != 2) {
    echo "<script>alert('No tiene permiso para acceder a esta pagina')</script>";
    die();
}
include './coneccion/Conexion.php';
$con = conectar();
$idUsuario = $_SESSION['idUsuario'];
$usuario = $_SESSION['usuario'];
$apellido = $_SESSION['apellido'];
$nombre = $_SESSION['nombre'];

$consulTodosUsu = "select * from usuario";
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
                <br>
                <a class="cerrarsesion" href="administradorInicio.php">Menu principal</a>
                <br>
                <h1>Listado total de clientes registrados</h1>
                <br>
                <div class="container-tabla">
                    <table>
                        <tr>
                            <th>Id usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Tel. Fijo</th>
                            <th>Celular</th>
                            <th>Email</th>
                        </tr>
                        <?php
                        $resultconsulta = mysqli_query($con, $consulTodosUsu);
                        while ($row = mysqli_fetch_assoc($resultconsulta)) {
                            ?>
                            <tr>
                                <td><?php echo $row['idUsuario']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['apellido']; ?></td>     
                                <td><?php echo $row['direccion']; ?></td>     
                                <td><?php echo $row['telefono_fijo']; ?></td>     
                                <td><?php echo $row['telefono_celular']; ?></td>     
                                <td><?php echo $row['correo_electronico']; ?></td>        
                            </tr>
                        <?php } ?>
                    </table>  
                </div>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/Scripts.js"></script>
    </body>
</html>
