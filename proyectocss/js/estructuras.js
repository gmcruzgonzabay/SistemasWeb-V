console.log("Archivo estructuras.js cargado.....");

let edad = 14;
let nota = 50;
if (edad >= 18) {
    console.log("Eres Mayor de edad");
} else {
    console.log("Eres menor de edad");
}

if (nota >= 90) {
    console.log("Excelente");
} else if (nota >= 80) {
    console.log("Muy bueno");
} else if (nota >= 70) {
    console.log("Bueno");
} else {
    console.log("Reprobado");
}

//switch

let dia = 2;

switch (dia) {
    case 1:
        console.log("Lunes");
        break;
    case 2:
        console.log("Martes");
        break;
    case 3:
        console.log("Miercoles");
        break;
    default:
        console.log("Dia no encontrado");
}


//estructura repetitiva For

//for(inicio ; condicion ; incremento){
//    
//}

for(let i=1;i<=10;i++)
    {
        
        if(i==5)
            {
                
                break;
            }
        
        console.log(i);
    }


