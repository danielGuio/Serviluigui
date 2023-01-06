<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link  rel = "stylesheet" href = "https://necolas.github.io/normalize.css/8.0.1/normalize.css">
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
                <h2 id="tituloFormRegisUsu">Formulario de registro de usuario</h2>
                <form class="form-registrar-usu" action="modelo/RegistrarUsuario.php" method="post" id="form-registrar-usu">
                    <div class="formulario_grupo" id="form_grupo_nom">            
                        <label for="nombre">Nombre</label>
                        <div class="form_grupo_input">
                            <input class="formulario-input" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" title="este campo no puede estar vacio" maxlength="25">
                            <i class="formulario-validacion-estado far fa-check-circle"></i>
                        </div>
                        <p class="form_input_error">El nombre solo puede contener letras, no caracteres especiale y/o numeros, debe ser menor a 20 caracteres</p>
                    </div>
                    <div class="formulario_grupo" id="form_grupo_apell"> 
                        <label for="apellido">Apellido</label>
                        <div class="form_grupo_input">
                            <input class="formulario-input" type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" title="este campo no puede estar vacio" maxlength="25">
                            <i class="formulario-validacion-estado far fa-check-circle"></i>
                        </div>
                        <p class="form_input_error">El apellido solo puede contener letras, no caracteres especiale y/o numeros, debe ser menor a 20 caracteres</p>
                    </div>             
                    <div class="formulario_grupo" id="form_grupo_email"> 
                        <label for="email">Correo electronico</label>
                        <div class="form_grupo_input">
                            <input class="formulario-input" type="email" id="email" name="email" placeholder="ejemplo@ejemplo.com" title="este campo no puede estar vacio, debe ingresar un correo con formato ejemplo@ejemplo.com"
                                   maxlength="50">
                            <i class="formulario-validacion-estado far fa-check-circle"></i>
                        </div>
                        <p class="form_input_error">El correo debe tener el formato ejemplo@ejemplo.com</p>
                    </div>     
                    <div class="formulario_grupo" id="form_grupo_dire"> 
                        <label for="direccion">Direccion</label>
                        <div class="form_grupo_input">
                            <input class="formulario-input" type="text" id="direccion" name="direccion" placeholder="Ingrese su direccion" maxlength="40">
                            <i class="formulario-validacion-estado far fa-check-circle"></i>
                        </div>
                        <p class="form_input_error">direccion valida debe tener 6 a 40 caracteres</p>
                    </div>     
                    <div class="formulario_grupo" id="form_grupo_telFijo">
                        <label for="tel_fijo">Telefono fijo</label>
                        <div class="form_grupo_input">
                            <input class="formulario-input" type="tel" id="tel_fijo" name="tel_fijo" placeholder="Ingrese su telefono" maxlength="10">
                            <i class="formulario-validacion-estado far fa-check-circle"></i>
                        </div>
                        <p class="form_input_error">El telefono solo debe tener numeros, maximo 10 caracteres</p>
                    </div>     
                    <div class="formulario_grupo" id="form_grupo_telCel">
                        <label for="tel_cel">Telefono celular</label>
                        <div class="form_grupo_input">
                            <input class="formulario-input" type="tel" id="tel_cel" name="tel_cel" placeholder="Ingrese su telefono" maxlength="10">
                            <i class="formulario-validacion-estado far fa-check-circle"></i>
                        </div>
                        <p class="form_input_error">El telefono solo debe tener numeros, maximo 10 caracteres</p>
                    </div>     
                    <div class="formulario_grupo" id="form_grupo_clave1">
                        <label for="claveRegistro">Contraseña</label>
                        <div class="form_grupo_input">
                            <input class="formulario-input" type="password" id="claveRegistro" name="claveRegistro" placeholder="Ingrese su contraseña" maxlength="10">
                            <i class="formulario-validacion-estado far fa-check-circle"></i>
                        </div>
                        <p class="form_input_error">La contraseña debe contener entre 4 a 10 caracteres</p>
                    </div>     
                    <div class="formulario_grupo" id="form_grupo_clave2">
                        <label for="claveRegistro2">Contraseña</label>
                        <div class="form_grupo_input">
                            <input class="formulario-input" type="password" id="claveRegistro2" name="claveRegistro2" placeholder="Ingrese su contraseña nuevamente" maxlength="10">
                            <i class="formulario-validacion-estado far fa-check-circle"></i>
                        </div>
                        <p class="form_input_error">Las contraseñas no coinciden</p>
                    </div>     
                    <div class="form_mensaje_error" id="form_mensaje_error">
                        <p><i class="far fa-exclamation-triangle"><b>Error:</b>Por favor llene el formulario de forma correcta</i></p>
                    </div>
                    <div class="form-grupo-btn-registrar">
                         <input type="submit" value="Registrarse" name="registrarUsu" class="form-btn-registrar-usu">
                        <p class="form-mensaje-exito" id="form-mensaje-exito">Registro de usuario exitoso</p>
                    </div>
                </form>
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
        <script src = " https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin = "anonymous"></script>
        <script src="js/Scripts.js"></script>
        <script src="js/ValidacionFormulario.js"></script>
    </body>
</html>
