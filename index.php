<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Soluciones para el hogar</title>
        <link rel="stylesheet" href="Style.css"/>
        <script src="https://kit.fontawesome.com/c74707d321.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header class="header">
            <div class="container logo-nav-container">
                <img src="Imagenes/SPH4.png" alt="Logo empresa" class="logo"/>
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
            <!-- comment -->
            <div class="container">
                <div class="container-slider">
                    <div class="slider" id="slider">
                        <div class="slider-section">
                            <img src="Imagenes/Imagen-Electrodomesticos-DG.png" alt="Imagen electrodomesticos" class="slider-img"/>
                        </div>
                        <div class="slider-section">
                            <img src="Imagenes/Imagen-Logo-Valores.png" alt="Img-Valores-Empresa" class="slider-img"/>
                        </div>
                        <div class="slider-section">
                            <img src="Imagenes/Cobertura-Servicios.png" alt="Imagen Cobertura" class="slider-img"/>
                        </div>
                        <div class="slider-section">
                            <img src="Imagenes/Imagen Domicilios.png" alt="Imagen domicilio" class="slider-img"/>
                        </div>
                    </div>
                    <div class="slider-btn slider-btn-right" id="btn-right">&#62;</div>
                    <div class="slider-btn slider-btn-left" id="btn-left">&#60;</div>
                </div>
                <div class="div-2do-bloque">
                    <div class="bloque-interno-derecha">
                        <img src="Imagenes/Imagen-tecnico-elec.png" alt="Imagen Como solicito servicio"/>
                    </div>
                    <div class="bloque-interno-izquierda">
                        <h2>¿Como Solicitar un servicio de mantenimiento o reparacion?</h2>
			    <p>parrafo agregado</p>
                        <ul>
                            <li>
                                Directamente al telefono 313-833-50-35
                            </li>
                            <li>
                                Por WhatSapp al número 313-833-50-35
                            <li>
                                En la opcion solicitar servicio, llene los campos requeridos para que 
                                un acesor se comunique con usted y programe su servicio
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="div-3er-bloque">
                    <h2>¿Por que elegir nuestro servicio?</h2>  
                    <img src="Imagenes/Marcas-unidas-DG.png" alt="Imagen Marcas"/>
                    <ul>
                         <li>
                            Contamos con presonal especializado en reparacion y mantenimiento de lavadoras, neveras,
                            estufas, calentadores, secadoras de cualquier tipo y/o tamaño
                         </li>
                         <li>
                            Nuestros tecnicos cuentan con una amplia experiencia en reparacion y mantenimiento de electrodomesticos
                         </li>
                         <li>
                             Especializados en marcas como Whirpool, LG, Samsung, Centrales, Mabe, General Electric, Abba, Haceb, entre otras...
                         </li>
                         <li>
                            Nuestra garantia por reparaciones cubre 90 dias despues de su realizacion 
                         </li>
                         <li>
                             Usamos repuestos originales y/o genericos de excelente calidad lo que nos permite brindar la garantia ya mencionada
                         </li>
                    </ul>
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
        <noscript>
            <p>Vienvenido, para hacer uso de esta pagina y
            sus opciones debe permitir el funsionamiento de javaScript, si lo deshabilito intencionalmente
            por favor habilitelo.
            </p>
	</noscript>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/Scripts.js"></script>
        <script src="js/ScriptSlider.js"></script>
    </body>
</html>
