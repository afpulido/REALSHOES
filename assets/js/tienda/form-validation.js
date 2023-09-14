const correo=document.querySelector("[name=email]","[type=email]");
const contraseña=document.querySelector("[name=password]","[type=password]");
const repitacontraseña=document.querySelector("[name=repassword]","[type=password]");
const nombre=document.querySelector("[name=nombre]","[type=text]");
const asunto=document.querySelector("[name=asunto]","[type=text]");
const celular=document.querySelector("[name=celular]","[type=numeric]");
const mensaje=document.querySelector("[name=mensaje]","[class=textarea]");
/* const =document.querySelector("[name=nombre]"); */

const documento =document.querySelector("[name=documento]");


/* inicio campos de login */
if(correo!=null){
    correo.addEventListener("blur", function(e){
        e.preventDefault();
        validarFormVoid(e);
        e.preventDefault();
        validarCorreo(e);
        e.preventDefault();
        validarCantidadLetras(e);
        e.preventDefault();
    });
}

if(contraseña!=null){
    contraseña.addEventListener("blur", function(e){
        validarFormVoid(e);
        e.preventDefault();
    });
}
/* fin campos de login */

/* inicio campos de registrarse */
if(repitacontraseña!=null){
    repitacontraseña.addEventListener("blur", function(e){
        validarFormVoid(e);
        e.preventDefault();

        
    });
}
/* fin campos de registrarse */

/* inicio campos de contactenos */
if(nombre!=null){
    nombre.addEventListener("blur", function(e){
        validarFormVoid(e);
        e.preventDefault();
    });
}

if(asunto!=null){
    asunto.addEventListener("blur", function(e){
        validarFormVoid(e);
        e.preventDefault();
    });  
}

if(celular!=null){
    celular.addEventListener("blur", function(e){
        validarFormVoid(e);
        e.preventDefault();
    });   
}

if(mensaje!=null){
    mensaje.addEventListener("blur", function(e){
        validarFormVoid(e);
        e.preventDefault();
    
    });
}

/* fin campos de contactenos */



/* inicio campos de  */

/* fin campos de  */

/* inicio campos de  */

/* fin campos de  */

/* inicio campos de  */

/* fin campos de  */

/* inicio campos de  */

/* fin campos de  */

/* inicio campos de  */

/* fin campos de  */



/* validar campos vacios */
function validarFormVoid(e){
    const field = e.target;
    const fieldValue = e.target.value;

    if(fieldValue.length === 0){
        field.classList.add("invalide");
        field.classList.remove("valide");
        field.nextElementSibling.classList.add("error");
        field.nextElementSibling.innerText=("Ingrese más de 3 caracteres");

    }else{
        field.classList.remove("invalide");
        field.classList.add("valide");
        field.nextElementSibling.classList.add("noerror");
        field.nextElementSibling.innerText=(" "); 
    }

    return field;

   /*  let textoPatron = /^[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]+$/;
    let correoPatron = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    let numerosPatron = /^[0-9]+$/;

    if(!textoPatron.test(fieldValue)){
        field.nextElementSibling.classList.add("error");
        field.nextElementSibling.innerText=("Ingrese valores correctos"); 
        console.log("no es texto");
    }else if(!correoPatron.test(fieldValue)){
        field.nextElementSibling.classList.add("error");
        field.nextElementSibling.innerText=("Ingrese valores correctos"); 
        console.log("no es correo");
    } else if(!numerosPatron.test(fieldValue)){

    }
    return field */
}

function validarTexto(e){
    let textoPatron = /^[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]+$/;
    const field = e.target;
    const fieldValue = e.target.value;

    if(!textoPatron.test(fieldValue)){
        field.classList.add("invalide");
        field.classList.remove("valide");
        field.nextElementSibling.classList.add("error");
        field.nextElementSibling.innerText=("Ingrese solo letras"); 
        console.log("no es texto");
    }else{
        field.classList.remove("invalide");
        field.classList.add("valide");
        field.nextElementSibling.classList.add("noerror");
        field.nextElementSibling.innerText=(" "); 
    }
    return field;
}
function validarCorreo(e){
    let correoPatron = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    const field = e.target;
    const fieldValue = e.target.value;

    if(!correoPatron.test(fieldValue)){
        field.classList.add("invalide");
        field.classList.remove("valide");
        field.nextElementSibling.classList.add("error");
        field.nextElementSibling.innerText=("Ingrese unos caracteres, un @  y almenos un punto (.)"); 
        console.log("no es texto");
    }else{
        field.classList.remove("invalide");
        field.classList.add("valide");
        field.nextElementSibling.classList.add("noerror");
        field.nextElementSibling.innerText=(" "); 
    }
    return field;

}
function validarNumeros(e){
    let numerosPatron = /^[0-9]+$/;
    const field = e.target;
    const fieldValue = e.target.value;

    if(!correoPatron.test(fieldValue)){
        field.classList.add("invalide");
        field.classList.remove("valide");
        field.nextElementSibling.classList.add("error");
        field.nextElementSibling.innerText=("Ingrese solo números"); 
        console.log("no es texto");
    }else{
        field.classList.remove("invalide");
        field.classList.add("valide");
        field.nextElementSibling.classList.add("noerror");
        field.nextElementSibling.innerText=(" "); 
    }
    return field;
}
    
function validarCantidadLetras(e){
    const field = e.target;
    const fieldValue = e.target.value;
    switch(fieldValue){
        case 1:{
            if(fieldValue.length >=3 || fieldValue.length < 20){

            }
            break;
        }
        case 2:{
            if(contraseña.length >=5 || contraseña.length < 16){
                
            }
            break;
        }
        case 3:{
            if(contraseña.length >50 || contraseña.length < 300){
                
            }
            break;
        }

    }
    return field;
   /*  else{
        field.classList.remove("invalide");
        field.classList.add("valide");
        field.nextElementSibling.classList.add("error");
        field.nextElementSibling.innerText=("Ingrese más de 2 caracteres"); 
    }
    if(contraseña.length >=5 || contraseña.length < 16){
    }else{
        field.nextElementSibling.innerText=("Ingrese min 5 y máx 16 caracteres"); 
    }
    if(recontraseña.length >=5 || recontraseña.length < 16){
    }else{
        field.nextElementSibling.innerText=("Ingrese min 5 y máx 16 caracteres"); 
    }

    if(mensaje.length >=20 || contraseña.length < 300){
    }else{
        field.nextElementSibling.innerText=("Ingrese min 20 y máx 300 caracteres"); 
    } */

}
