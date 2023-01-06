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
            <div class="container" id="particles-js">                
            </div>
            <div class="cont-form-login">
                <form action="modelo/ValidarLogin.php" method="post" id="form-login" name="form-login">
                    <label for="usuario">Usuario(email)</label>
                    <input type="text" id="usuario" name="usuario" required maxlength="50">
                    <label for="clave">contraseña</label>
                    <input type="password" id="clave" name="clave" required maxlength="10">
                    <a href="registrarse.php"><input type="button" class="btn-form-ingreso" name="Registrarse" value="registrarse"></a>
                    <input type="submit" class="btn-form-ingreso" name="ingresar" value="Ingresar">
                </form>
            </div>
            <p class="mensaje_clave_user">Importante: si ested no se registro pero si solicito un servicio por favor ingrese con su
            email como usuario y el numero de telefono con el que solicito el servicio como contraseña </p>       
                <div class="div-mensaje-error-login">
                    <p id="error-usu-inco" class="mens-error-login">usuario incorrecto, para mas ayuda por favor envie un correo a solucionesparasuhogar@gmail.com</p>
                    <p id="error-clave-inco" class="mens-error-login">Contraseña incorrecta  -- <a href="#">Recuperar contraseña</a></p>
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
        <script src="js/particles.min.js"></script>
        <script src="js/particulasApp.js"></script>
        <script src="js/validarLogin.js"></script>
    </body>
</html>
