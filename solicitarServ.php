<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $idUsuario = $_SESSION['idUsuario'];
    $usuario = $_SESSION['usuario'];
    $apellido = $_SESSION['apellido'];
    $nombre = $_SESSION['nombre'];
    include './coneccion/Conexion.php';
    if (isset($_GET['electrodomestico'])) {
        $con = conectar();
        $idElectrodomestico = $_GET['electrodomestico'];
        $consultaElect = "select tipo_electro, marca from electrodomesticos where idelectrodomesticos = '$idElectrodomestico'";
        $resultadoConsulElect = mysqli_query($con, $consultaElect);
        $inforecibidaElec = mysqli_fetch_assoc($resultadoConsulElect);
        $tipo_electro = $inforecibidaElec['tipo_electro'];
        $marca_electro = $inforecibidaElec['marca'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Soluciones para su hogar</title>
        <link rel="stylesheet" href="Style.css"/>
        <script src="https://kit.fontawesome.com/c74707d321.js" crossorigin="anonymous"></script> 

        <script>
<?php
echo "var nom = '$nombre';";
echo "var apell = '$apellido';";
echo "var ema = '$usuario';";
if (isset($idElectrodomestico)) {
    echo "var tipo_electro = '$tipo_electro';";
    echo "var marca_electro = '$marca_electro';";
} else {
    echo "var tipo_electro = '';";
    echo "var marca_electro = '';";
}
?>
        </script>

    </head>
    <body>        
        <header class="header">
            <div class="container logo-nav-container">
                <img src="Imagenes/Logo empresa3.png" alt="Logo empresa" class="logo"/>
                <span class="menu-icon">ver menu</span>
                <nav class="navigation">
                    <ul>
                         <?php
                        if(isset($_SESSION["usuario"]) && $_SESSION["tipousu"]==1) {   ?>
                            <li><a href="usuario.php">Menu usuario</a></li>
                         <?php } 
                         if(isset($_SESSION["usuario"]) && $_SESSION["tipousu"]==2) {
                                ?>
                            <li><a href="administradorInicio.php">Menu usuario</a></li>
                        <?php } ?>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="solicitarServ.php">Solicitar Servicio</a></li>
                        <li><a href="quienesSomos.php">Quienes somos</a></li>
                        <li><a href="Ingresar.php">Ingresar</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main">
            <form action="modelo/registrarServicio.php" method="post" class="formulario-sol-serv" id="formulario-sol-serv" onsubmit="return validar();">
                <h2>Formulario de solicitud de servicio</h2>
                <label for="nombre">Nombre</label>
                <input class="boxtex" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                <p class="mens-error-regist_serv" id="text-error-nom-sol-ser">El campo nombre no puede estar vacio, no incluir caracteres especiales</p>
                <br>
                <label for="apellido">Apellido</label>
                <input class="boxtex" type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido">
                <p class="mens-error-regist_serv" id="text-error-ape-sol-ser">El campo apellido no puede estar vacio, no incluir caracteres especiales</p>
                <br>
                <label for="email">Correo electronico</label>
                <input class="boxtex" type="email" id="email" name="email" placeholder="ejemplo@ejemplo.com">
                <p class="mens-error-regist_serv" id="text-error-email-sol-ser">Debe digitar un correo valido,ejemplo@ejemplo.com</p>
                <br>
                <label for="direccion">Direccion</label>
                <input class="boxtex" type="text" id="direccion" name="direccion" placeholder="Ingrese su direccion">
                <p class="mens-error-regist_serv" id="text-error-dir-sol-ser">El campo direccion no puede estar vacio</p>
                <br>
                <label for="telefonoCel">Telefono celular</label>
                <input class="boxtex" type="tel" id="telefonoCel" name="telefonoCel" placeholder="Ingrese su telefono">
                <p class="mens-error-regist_serv" id="text-error-tel-sol-ser">El campo telefono celular no puede estar vacio, debe ingresar solo numeros, maximo 10 caracteres</p>
                <br>
                <p class="subti-mens-soli-ser">Seleccione el tipo de electrodomestico</p>
                <select id="tipoelectro" class="select-tipo-marca" name="tipoElectro">
                    <option id="tipoElect-null"></option>
                    <option id="tipoElect-nevera">Nevera</option>
                    <option id="tipoElect-lavadora">Lavadora</option>
                    <option id="tipoElect-secadora">Secadora</option>
                    <option id="tipoElect-lav-sec">Lavadora Secadora</option>
                    <option id="tipoElect-calentador">Calentador</option>
                    <option id="tipoElect-estufa">Estufa</option>
                    <option id="tipoElect-otro">Otro</option>
                </select>
                <p class="mens-error-regist_serv" id="text-error-tipoelec-sol-ser">debe seleccionar una de las opciones en tipo de electrodomestico</p>
                <p class="subti-mens-soli-ser">Seleccione la marca del electrodomestico</p>
                <select id="marcaelectro" class="select-tipo-marca" name="marcaElectro">
                    <option id="marcaElec_null"></option>
                    <option id="marcaElec_LG">LG</option>
                    <option id="marcaElec_Whirpool">Whirpool</option>
                    <option id="marcaElec_Samsung">Samsung</option>
                    <option id="marcaElec_centrales">Centrales</option>
                    <option id="marcaElec_abba">Abba</option>
                    <option id="marcaElec_GE">General Electric</option>
                    <option id="marcaElec_mabe">Mabe</option>
                    <option id="marcaElec_icasa">Icasa</option>
                    <option id="marcaElec_otra">Otra</option>
                </select>
                <p class="mens-error-regist_serv" id="text-error-marcaElec-sol-ser">debe seleccionar una de las opciones en marca de electrodomestico</p>
                <p class="subti-mens-soli-ser">Seleccione el tipo de servicio requerido</p>
                <input type="radio" id="mantenimiento" value="Mantenimiento" name="tiposervicio"/>Mantenimiento
                <input type="radio" id="reparacion" value="Reparacion" name="tiposervicio"/>Reparacion
                <input type="radio" id="garantia" value="Garantia" name="tiposervicio"/>Garantia
                <p class="mens-error-regist_serv" id="text-error-tiposer-sol-ser">debe seleccionar al menos una opcion en tipo de servicio</p>
                <p id="parrafotextar">Si su tipo de servicio es reparacion o garantia por favor indique a continuacion que fallas presenta:</p>
                <textarea class="form-textarea" name="observaciones" placeholder="Indique fallas o caracteristicas irregulares en el funcionamiento de su electrodomestico"></textarea>
                <p class="mens-error-regist_serv" id="text-error-camposvacioc-sol-ser">Todos los campos son obligatorios</p>
                <input type="submit" name="solicitar" value="Solicitar" class="btn-solicitar">
            </form>
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
        <noscript>
            <p>Vienvenido, para hacer uso de esta pagina y
            sus opciones debe permitir el funsionamiento de javaScript, si lo deshabilito intencionalmente
            por favor habilitelo.
            </p>
	</noscript>
        <script src="js/validarFormSoliServ.js"></script>
        <script src="js/val_fol_ser_user_exist.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/Scripts.js"></script>
    </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             