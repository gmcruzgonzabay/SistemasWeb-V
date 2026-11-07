<?php
session_start();
if($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
        header('Location:ingreso.php');
        exit;
    }

    $nombre= $_POST['nombre'] ?? '' ;
    if( !is_string($nombre))
        {
                http_response_code(442);
                exit('Nombre invalido');

        }
        $nombre= trim($nombre);



        session_regenerate_id(true);
        $_SESSION['nombre']=$nombre;
        header('Location:panel.php',true,303);
        exit();










?>