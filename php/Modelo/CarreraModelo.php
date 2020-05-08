<?php

class carreraBD {
    
    private $con;
    private $carrera;
    
    public function __construct(){

        include_once( dirname( __FILE__ ).'/BaseDatos/conexion.php');

        $this->con = conexionDB::conectar();
        $this->carrera = array();
    }
    
    public function guardarCarrera( $nombre, $claveCarrera ){
        
        $fechaActual = date('Y-m-d');

        $sql = "INSERT INTO carrera( nombre, clave_carrera, estado, fecha_registro) 
                VALUES (:Nombre,:Clave,1,:Fecha)";

        $statement = $this->con->prepare($sql);

        $statement->bindParam(':Nombre', $nombre);
        $statement->bindParam(':Clave', $claveCarrera);
        $statement->bindParam(':Fecha', $fechaActual);

        $resultado = $statement->execute();

        return $resultado > 0;
    }

    public function eliminarCarrera( $IdCarrera ){

        $sql = "DELETE FROM carrera WHERE id_carrera = :Id";

        $statement = $this->con->prepare($sql);

        $statement->bindParam(':Id', $IdCarrera);

        $resultado = $statement->execute();

        return $resultado > 0;
    }

    public function ActualizarCarrera( $nombre, $claveCarrera, $IdCarrera ){

        $fechaActual = date('Y-m-d');

        $sql = "UPDATE carrera 
        SET nombre = :Nombre,clave_carrera = :Clave, estado = 1,fecha_registro = :Fecha 
        WHERE id_carrera = :Id";

        $statement = $this->con->prepare($sql);

        $statement->bindParam(':Id', $IdCarrera);
        $statement->bindParam(':Nombre', $nombre);
        $statement->bindParam(':Clave', $claveCarrera);
        $statement->bindParam(':Fecha', $fechaActual);

        $resultado = $statement->execute();

        return $resultado > 0;
    }

    public function seleccionarCarrera(){

        $sql = "SELECT id_carrera, nombre, clave_carrera, fecha_registro FROM carrera";

        $statement = $this->con->prepare( $sql );
        $statement->execute();
        $resultado = $statement->fetchAll();

        foreach( $resultado as $fila ){
            $this->carrera[] = $fila;
        }
        
        return $this->carrera;
    }

}

?>