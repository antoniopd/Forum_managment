<?php

class conexion{

    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "";
    private $conexion;

    public function __construct(){
       
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=album", $this->usuario, $this->password); 
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
         catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

// Inserción que ejecuta una instrucción SQL Y devuelve el número de filas afectadas en este cado el id de la fila insertada
    public function ejecutar($sql){ // insert, update, delete

        $this->conexion->exec($sql); // ejecuta la instrucción sql
        return $this->conexion->lastInsertId(); // devuelve el id de la fila insertada
    }

    public function consultar($sql){ // select

        $sentencia = $this->conexion->query($sql); // ejecuta la instrucción sql
        return $sentencia->fetchAll(); // devuelve un array con los resultados de la consulta
    }

}

?>