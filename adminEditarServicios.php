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
$idServicio = $_GET['idServivio'];

$consulServRecib = "select nombre, apellido, electrodomesticos.idelectrodomesticos, tipo_electro, marca, electrodomesticos.observaciones as obsElect, 
    telefono_celular,idservicios, direccionservicio, telservicio, fechaProgramadoServicio, horaPorgramadoServicio,
    valorcobrado, fecha_solicitud_serv, fecha_finalizacion_serv, danio_presentado, servicios.observaciones as servObser,
    estadoservicio, tiposervicio from usuario inner join  electrodomesticos on usuario.idUsuario = electrodomesticos.idUsuario 
    inner join servicios on electrodomesticos.idelectrodomesticos = servicios.idelectrodomesticos inner join
    estadoservicio on servicios.idestadoservicio = estadoservicio.idestadoservicio inner join tiposervicio on 
     servicios.idtiposervicio = tiposervicio.idtiposervicio where idservicios = '$idServicio'";
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
                <h1>Editar/ver Servicio</h1>
                <br>
                <p>
                    Bienvenido, aqui usted como administrador puede verificar toda la informacion referente a un
                    servicio especifico, si lo que desea es revisar la informacion hagalo sin editar los campos. Si
                    por el contrario quere actualizar la informacion del servicio lo puede hacer solo en los campos 
                    permitidos resaltados en color naranja.
                    Despues debe dar clic en el boton editar para guardar la informacion nueva en la base de datos.
                </p>
                <?php
                $resultconsulta = mysqli_query($con, $consulServRecib);
                while ($row = mysqli_fetch_assoc($resultconsulta)) {
                    ?>
                <form action="modelo/ActualizarServicio.php" class="form_edit_serv" method="post">
                    <input type="hidden" id="idElect" name="idElect" readonly="true" value="<?php echo $row['idelectrodomesticos']; ?>">
                    <input type="hidden" id="idserv" name="idser" readonly="true" value="<?php echo $row['idservicios']; ?>">
                        <div class="form_edit_serv_grupo">
                            <label for="nom">Nombre:</label>
                            <input type="text" id="nom" name="nom" readonly="true" value="<?php echo $row['nombre'] . " " . $row['apellido']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">
                            <label for="tipoelectro">Tipo Electrodomestico:</label>
                            <input type="text" id="tipoelectro" readonly="true" value="<?php echo $row['tipo_electro']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">        
                            <label>Marca Electrodomestico:</label>
                            <input type="text" readonly="true" value="<?php echo $row['marca']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label class="form_edit_serv_camp_editar">Observaciones Electrodomestico:</label>
                            <textarea name="observElectro"><?php echo $row['obsElect']; ?></textarea>
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label>Celular Usuario:</label>
                            <input type="text" readonly="true" value="<?php echo $row['telefono_celular']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo"> 
                            <label>Direccion Servicio:</label>
                            <input type="text" readonly="true" value="<?php echo $row['direccionservicio']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label>Telefono Servicio:</label>
                            <input type="text" readonly="true" value="<?php echo $row['telservicio']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label class="form_edit_serv_camp_editar">Fecha de programacion servicio:</label>
                            <input type="text" name="fechaProgServ" value="<?php echo $row['fechaProgramadoServicio']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label class="form_edit_serv_camp_editar">Hora de programacion servicio:</label>
                            <input type="text" name="horaProgServ" value="<?php echo $row['horaPorgramadoServicio']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label class="form_edit_serv_camp_editar">Valor cobrado:</label>
                            <input type="text" name="valorCobrado" value="<?php echo $row['valorcobrado']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label>Fecha solicitud Servicio:</label>
                            <input type="text" readonly="true" value="<?php echo $row['fecha_solicitud_serv']; ?>">
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label class="form_edit_serv_camp_editar">Daño presentado:</label>
                            <textarea name="danioPresentado"><?php echo $row['danio_presentado']; ?></textarea>
                        </div>
                        <div class="form_edit_serv_grupo">         
                            <label class="form_edit_serv_camp_editar">Observaciones Servicio:</label>
                            <textarea><?php echo $row['servObser']; ?></textarea>
                        </div>
                        <div class="form_edit_serv_grupo"> 
                            <label class="form_edit_serv_camp_editar">Estado servicio:</label>
                            <select id="EstadoServ" class="select-estadoServ" name="selectEstadoServ">                              
                                <option <?php if ($row['estadoservicio'] == "Recibido") { ?> selected="true"<?php } ?>>Recibido</option>
                                <option <?php if ($row['estadoservicio'] == "Programado") { ?> selected="true"<?php } ?>>Programado</option>
                                <option <?php if ($row['estadoservicio'] == "Realizado") { ?> selected="true"<?php } ?>>Realizado</option>
                            </select>
                        </div>
                        <div class="form_edit_serv_grupo">        
                            <label>Tipo servicio:</label>
                            <input type="text" readonly="true" value="<?php echo $row['tiposervicio']; ?>">                          
                        </div>
                        <div class="form_edit_serv_grupo">  
                            <input type="submit" class="btn-form-ingreso" value="actualizar" name="actualizar">
                        </div>
                    </form>
                <?php } ?>                         
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/Scripts.js"></script>
    </body>
</html>
