<?php
class estudiante
{
    private PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db=$db;

       // throw new \Exception('Not implemented');
    }

    public function listar():array
    {

        $sql='SELECT id, nombre,correo FROM estudiantes ORDER BY id';
        $consulta=$this->db-> prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll() ;
    }

}


?>