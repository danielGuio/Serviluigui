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
                         <?php session_start();
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
            <div class="container">
                <div class="container-quienesSomos">
                    <figure>
                        <img src="Imagenes/Logo empresa2.png" alt="Logo Empresa"/>
                        <p>Somos una compañia ubicada en la ciudad de Bogota dedicada al mantenimiento y 
                            reparacion de electrodomesticos, Enfocados en prestar un execelente servicio, para 
                            ello contamos con tecnicos especializados y capacitados en lograr nuestra principal meta
                            La satisfaccion del cliente
                        </p>
                    </figure>
                </div>
                <div class="cont-mision-vision"> 
                    <div class="mision"> 
                        <h2>Mision</h2>
                        <p>
                            Lograr las satisfaccion total del cliente realizando servicios de mantenimiento y/o 
                            reparacion de los electrodomesticos, enfocados en dar solucion a las necesidades y requerimientos 
                            de nuestros clientes, devolvientdo los electrodomesticos a su mejor estado
                        </p>
                    </div>
                    <div class="vision"> 
                        <h2>Vision</h2>
                        <p>
                           Para el año 2025 seremos la empresa lider a nivel Bogota en la reparacion y mantenimiento de 
                           electrodomesticos con los mejores estandares de calidad y buen servicio, logrando una exelente 
                           reputacion por nuestra honestidad, capacidad, servicio y buenos precios
                        </p>
                    </div>
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
                        <li><a href="https://www.youtube.com/channel/UCcys_M2e0R782dp��� �c�   ГMg                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    2 ���S!�
f��B 2                  ��=�m__$__targetStorageMarker{"workbench.panel.markers":1,"workbench.panel.output":1,"terminal":1,"workbe