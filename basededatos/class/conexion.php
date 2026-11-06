//Archivo para llamar a la conexion de la base de datos
<?php
//funciones en php, puede ser publica o privada(PUBLIC O PRIVATE)

class conexion
{
    //Declara un metodo accesible desde fuera(PUBLIC) :PDO establece que debe 
    //devolver un objeto de tipo PDO si finaliza correctamente
    public function  conectar(): PDO 
    {


        $config =require __DIR__ . '/../config/database.php';
        $dsn="mysql:host={$config['host']};"
             ."port={$config['port']};"
             ."dbname={$config['dbname']}; "
             ."charset={$config['charset']}" ;
        $opciones=[

        PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION, // solicita que los errores de PDO se comuniquen mediante excepciones que atenderemos con el catch
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,//Hace que los resultados se lean por el nombre de la columna, como nombre o correo
        PDO::ATTR_EMULATE_PREPARES=>false,//Solicita preparaciones nativas cuando el controlador y la sentencia las permiten, en lugar de la emulacion de PDO
        ];

        return new PDO(
            $dsn,$config['user'],$config['password'],$opciones

        );// new crear un objeto de conexion con DSN, usuario, contraseña y opciones, y el return lo entrega a quien lo solicita
        //Si existe un problema esta funcion muestra una excepcion

    }
}





?>