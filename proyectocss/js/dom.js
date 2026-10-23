console.log("Archivo dom.js cargado");
//DOM es decir elementos HTML

let titulo= document.getElementById("titulo");
console.log(titulo);
titulo.textContent="Hola desde JavaScript"; // Cambiar el contenido o texto del ID
titulo.style.color="red";
titulo.style.backgroundColor="yellow";
titulo.style.fontSize="50px";
titulo.style.textAlign="Center";

titulo.style.border="2px solid blue";
titulo.style.borderRadius="30px";
titulo.style.padding="20px";
titulo.style.fontWeight="bold";

//ocultar
//titulo.style.display="none";

//mostrar
//titulo.style.display="block";

let boton= document.getElementById("btnEnviar");



document.getElementById("btnActivar").addEventListener("click",function (){
    console.log("Ingreso a la función activar");

    boton.disabled=false;
    
                                                       
});

document.getElementById("btnDesactivar").addEventListener("click",function (){
    console.log("Ingreso a la función Desactivar");

    boton.disabled=true;
   // boton.style.color="red";
                                                       
});

