console.log("Archivo APP.js cargado...");

//Capturar los elementos del formulario

const nombre= document.getElementById("nombre");
const correo= document.getElementById("correo");
const edad= document.getElementById("edad");
const pais= document.getElementById("pais");
const clave= document.getElementById("clave");
const confirmar=document.getElementById("confirmar");
const usuario= document.getElementById("usuario");
const terminos=document.getElementById("terminos");
const boton=document.getElementById("validar");
const resultado= document.getElementById("resultado");

boton.addEventListener("click",function(evento){

    evento.preventDefault();
    let errores=[];

    //validadr nombre
    if(nombre.value.trim().length < 3){
        errores.push("El nombre debe tener al menos 3 caracteres");
       // console.log("El nombre debe tener al menos 3 caracteres");
    }

 //edad
    if( edad.value.trim() === "" || 
    Number(edad.value)<18 || Number(edad.value)>65 )
    {
            errores.push("La edad debe estar entre 18 y 65 años");
           // console.log("La edad debe estar entre 18 y 65 años");
    }


    //Validar Pais
    if(pais.value==="")
    {
        errores.push("Selecciona un Pais")
       // console.log("Selecciona un Pais");

    }

    //validar la contraseña
    if(clave.value.length < 8)
    {
        errores.push("La contraseña debe tener al menos 8 caracteres");
        //console.log("La contraseña debe tener al menos 8 caracteres");

    } 

    //confirmar la contraseña
    if(confirmar.value != clave.value)
    {
        errores.push("Las contraseñas no coinciden")
       // console.log("Las contraseñas no coinciden");

    }

    //Validar el usuario
    if(usuario.value.trim().length <5){
        errores.push("El usuario debe tener al menos 5 caracteres")
       // con
       // sole.log("El usuario debe tener al menos 5 caracteres")
    }


    //validar correo
    if(correo.value.trim==="")
    {
        errores.push("El correo electronico es obligatorio");
    }

    if(!correo.value.includes("@"))
    {
        errores.push("El correo debe tener @");
    }

    //validar los termino
    if(!terminos.checked)
    {
        errores.push("Debe aceptar los términos y condiciones")
        //console.log("Debe aceptar los términos y condiciones");
    }




    //mostrar los resultados
    if(errores.length > 0)
    {
        console.log("Errores encontrados");
        errores.forEach(function (error){

            const mensaje= document.createElement("p");
            mensaje.textContent=error;

            resultado.appendChild(mensaje);


            console.log("-" +error);
        });
    }

    else
    {
        resultado.textContent="Formulario valido. Tidis los datos son correctos";
    }


});
