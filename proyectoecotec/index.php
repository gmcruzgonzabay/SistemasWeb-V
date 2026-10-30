<?php
require_once 'models/estudiante.php';


$estudiante=new Estudiante(); //instacio la clase
$estudiante->nombre= "Carlos"; //le envio los datos a los atributos
$estudiante->edad=30;

echo "Hola Mundo";
//LInea de comentario

/* Bloque de 
comentario */


//Declaracion de variables
$nombre= "Juan";
$edad=15;
$universidad="Ecotec";
echo "<br>";
echo $nombre;
echo "<br>";
echo $edad;
echo "<br>";
echo $universidad;
echo "<br>";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Ecotec</title>
</head>
<body>

<?php
echo "<p>Datos del estudiante</p>"
// fin de php
?> 
<p>Nombre:  <?php echo $nombre; ?></p>
<p>Edad: <?php 
if($edad>=18)
    {
        echo "<p> El estudiante es mayor de edad</p>";
    }
    else
        {
              echo "<p> El estudiante es menor de edad</p>";

        }
?></p>

<h2>Datos del estudiante desde la clase</h2>

<?php
$estudiante->mostrarDatos();

?>

    
</body>
</html>

