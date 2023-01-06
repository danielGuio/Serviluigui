window.addEventListener('load',() =>{
  
    let button = document.getElementById('form-login');
    let usuario = document.getElementById('usuario');
    let clave = document.getElementById('clave');
    
    function data(){
        let datos = new FormData();
        datos.append('usuario', usuario.value);
        datos.append('clave', clave.value);
        fetch('/Serviluigui/modelo/ValidarLogin.php',{
            method: 'POST',
            body: datos
        }).then(response => response.json())
                .then(({success}) => {
            if (success === 0){
                document.getElementById('error-usu-inco').classList.add('mens-error-login-activo');
            }else if(success === 1){
                document.getElementById('error-clave-inco').classList.add('mens-error-login-activo');
                document.getElementById('error-usu-inco').classList.remove('mens-error-login-activo');
            }else if(success === 2){
                location.href = '/Serviluigui/usuario.php';
            }else if(success === 3){
                location.href = '/Serviluigui/administradorInicio.php';
            }
        });
    }
    button.addEventListener('submit',(e) => {
        e.preventDefault();
        data();
    });
});

