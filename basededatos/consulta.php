<?php
$nombre= $_GET['nombre'] ?? ''; //Valores nulos
$nombre = is_string($nombre) ? trim($nombre) : ''; // if(valor){ valor por verdadero}else{ valor por falso}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta GET</title>
</head>
<body>

<h1> Consulta por Nombre</h1>

<form action=''  method='get'>

<label>Nombre</label>
<input id="nombre" name="nombre" required>

<button type="submit">Consultar</button>


</form>
<?php if($nombre !==''):?>
<p>Nombre recibido:<?= htmlspecialchars($nombre,ENT_QUOTES, 'UTF-8') ?> </p>
<?php endif ?>
<a href="index.php">Ver estudiantes</a>


</body>
</html>



