


/* Error al registrar Usuario
Registro exitoso

Bienvenido!
Error al iniciar sesión

usuario o contraseña erroneos

Cuenta desactivada ¡Contacta a la mesa de ayuda sopore@realshoes.com!

El correo no se encuentra registrado

Se ha enviado un correo para reestablecer su contraseña

Has cerrado sesón exitosamente ¡Vuelve Pronto!

No hay coincidencias en la Busqueda

Error al registrar un rol
Error al Registrar 


tipo de acciones
    success exitoso
    error   error
    warning advertencia
    info    informacion
    question  */

    /* errores codigos{
        0 = no mostrar mensaje
        1 exitoso
        2 error
        3 activar
        4 desactivar
        5 eliminar
    } */ 

    /* mensaje = $_session['MensajeUsuario']; */


    alertas= document.getElementById("formulario").addEventListener("click", function(event){
        event.preventDefault()
        botonMensaje(id);
        
      });

    function probarBoton(e){
        e.preventDefault();
        botonMensaje(id);{
        if(id==0){
        }else if(id==1){
            mensajeOk();
        }else if (id==2){
            mensajeError(id);
        }else if(id==3){
            mensajeStatusActivo();
        }else if (id==4){
            mensajeStatusInactivo();
        }else if (id==5){
            mensajeEliminar();
        }
        e.preventDefault();
        }
    }

    /*     if(id==null){
        }else if(id==1){
            mensajeOk(1);
        }else if (id==2){
            mensajeError(id);
        }else if(id==3){
            mensajeStatusActivo();
        }else if (id==4){
            mensajeStatusInactivo();
        }else if (id==5){
            mensajeEliminar();
        } */

    


    /* funciones de mensajes comunes */
    function mensajeError(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: "error mensaje",
                showConfirmButton: false,
                timer: 20000
            });
    }
    function mensajeOk(){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 15000
          })
    }
    function mensajeStatusActivo(){
        Swal.fire({
            title: 'Desea activar este estado',
            text: "Esta acción es reversible pero solo por el personal autorizado en el sistema ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Activar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Activación!',
                    'Acción Exitosa.',
                    'success'
                    )
                }
        })
    }
    function mensajeStatusInactivo(){
       Swal.fire({
        title: 'Desea activar y/o Desativar esto',
        text: "Esta acción es reversible pero solo por el Administrador del sistema ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Desactivar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Activación y/o Desactivado!',
                'Acción Exitosa.',
                'success'
                )
            }
        })
    }
    function mensajeEliminar(){
        Swal.fire({
            title: 'Eliminar definitivamente',
            text: "Esta acción es  irreversible ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Eliminado!',
                'Esto ha sido eliminado.',
                'success'
                )
            }
        })     
    }

    
