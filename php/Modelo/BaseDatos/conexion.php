<?php

include_once('config.php');

class conexionDB{

    public $conexion;

    public static function conectar(){

        try{
            $conexion = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET UTF8");

        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }

        return $conexion;
    }
}

?>