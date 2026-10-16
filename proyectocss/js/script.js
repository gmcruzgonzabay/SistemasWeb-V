//Funcion en JS, en JS es sensible a mayusculas y minusculas, DOM
console.log("Archivo JS cargado");


//Declaracion de variables
let nombre="Carlos";
let apellido='Cruz';
let estadoMatricula=true;
const pi=3.14;
console.log(nombre);
nombre= "Pedro";
console.log(nombre);
console.log(apellido);
console.log(typeof apellido);

//Numeros
let edad=30;
console.log(edad);
console.log(typeof edad);
edad="30";
console.log(edad);
console.log(typeof edad);

console.log('El estado del estudiante es '+estadoMatricula );

console.log(pi);
``
//pi=4

console.log(pi);

//Array o listas
let frutas=["Manzana","Uva", "Mango"];
console.log(frutas);
console.table(frutas);

let estudiante=[
    {nombre: "Carlos", edad: 20,nota:9},
    {nombre: "Juan", edad: 25,nota:7},
    {nombre: "Maria", edad: 23,nota:10},
];
console.table(estudiante);

console.table(estudiante,["nombre","nota"]);

console.error(nombre);
console.warn(nombre);
console.info("EL nombre del usuario",nombre);
console.log(" 🔥 Error critico");


function abrirMenu()
{
    const menu= document.querySelector("nav ul");
    menu.classList.toggle("activo");
    
}