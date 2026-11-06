<?php
    require_once __DIR__ .'/class/conexion.php';
    try{
        $conexion=new conexion();
        $db=$conexion->conectar();
        echo'Conexion correcta a ecotec web';

    }
    catch(PDOException $e)

    {
        error_log($e->getMessage());
        exit('No se pudo conectar. Revise configuracion y registro');


    }

?>