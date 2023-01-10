<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipousu'] != 1) {
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
                <h1>Bienvenido(a) <?php echo " " . $nombre . " " . $apellido; ?></h1>
                <p>Al ser un usuario registrado usted podra llevar un control detallado y eficaz de sus electrodomesticos
                    y los servicios que le hallamos realizado, visualizando sus electrodomesticos registrados y los servicios
                    ya sean mantenimiento o reparacion que le han realizado
                </p>
                <h2>Electrodomesticos inscritos</h2>
                <div class="container-tabla">
                    <table>
                        <tr>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Observaciones</th>
                            <th>Solicitar Servicio</th>
                        </tr>
                        <?php
                        $resultconsulta = mysqli_query($con, $consultElec);
                        while ($row = mysqli_fetch_assoc($resultconsulta)) {
                            ?>
                            <tr>
                                <td><?php echo $row['tipo_electro']; ?>
                                </td>
                                <td><?php echo $row['marca']; ?></td>
                                <td><?php echo $row['observaciones']; ?></td>
                                <td><?php echo "<a href='solicitarServ.php?electrodomestico=$row[idelectrodomesticos]'>Solicitar</a>" ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <h2>Historial de Servicios</h2>
                <div class="container-tabla">
                    <table>
                        <tr>
                            <th>Tipo Servicio</th>
                            <th>Tipo electrodomestico</th>
                            <th>marca electrodomestico</th>
                            <th>Estado</th>
                            <th>Fecha progracion</th>
                            <th>Direccion servicio</th>
                            <th>Telefono contacto</th>
                        </tr>
                        <?php
                        $resultconsultaser = mysqli_query($con, $consutServ);
                        while ($filas = mysqli_fetch_assoc($resultconsultaser)) {
                            ?>
                            <tr>
                                <td><?php echo $filas['tiposervicio']; ?></td>
                                <td><?php echo $filas['tipo_electro']; ?></td>
                                <td><?php echo $filas['marca']; ?></td>
                                <td><?php echo $filas['estadoservicio']; ?></td>
                                <td><?php echo $filas['fechaProgramadoServicio']; ?></td>
                                <td><?php echo $filas['direccionservicio']; ?></td>
                                <td><?php echo $filas['telservicio']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

                <div class="container-Form-Registrar-Electro">
                    <h2>Registrar un nuevo electrodomestico</h2>
                    <form action="modelo/RegistrarElectrodomestico.php" method="post">
                        <p>Seleccione el Tipo de electrodomestico</p>
                        <select id="tipoelectro" class="select-tipo-marca" name="tipoelectro">
                            <option>Nevera</option>
                            <option>Lavadora</option>
                            <option>Secadora</option>
                            <option>Lavadora Secadora</option>
                            <option>Calentador</option>
                            <option>Estufa</option>
                            <option>Otro</option>
                        </select>
                        <p>Seleccione la marca del electrodomestico</p>
                        <select id="marcaelectro" class="select-tipo-marca" name="marcaelectro">
                            <option>LG</option>
                            <option>Whirpool</option>
                            <option>Samsung</option>
                            <option>Centrales</option>
                            <option>Abba</option>
                            <option>General Electric</option>
                            <option>Mabe</option>
                            <option>Otra</option>
                        </select>
                        <label for="observaciones">Observaciones</label>
                        <textarea class="form-textarea" name="observaciones" placeholder="Escriba observaciones como: tamaño, capacidad, tipo de carga (frontal o superior), etc">
                        </textarea>
                        <input type="submit" name="registrarElectro" value="Registrar" class="btn-solicitar">
                    </form>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                <div class="datos-Footer">
                    <p>
                        Contacteno
                    </p>
                    <p>
                        Telefono: 313-833-50-35
                    </p>
                    <p>
                        SolucionesParaSuHogar@gmail.com
                    </p>
                </div>


                <p>parrafo creado en editbranch</p>
                <div class="contenedor-redes-sociales">
                    <ul>
                        <li><a href="https://www.facebook.com/daniel.guiorojas" class="facebook"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCcys_M2e0R782dp-bedr8cA" class="youtube"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#titulo del index
