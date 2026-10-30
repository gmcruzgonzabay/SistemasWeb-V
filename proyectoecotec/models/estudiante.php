<?php
class Estudiante
{
    public $nombre;
    public $edad;


    public function mostrarDatos()
    {
        echo "Nombre: ".$this->nombre;
        echo "<br> Edad:". $this->edad;
    }


}

?>