<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
        $array[] = new DatosConexion("pruebasITSY","","","","");
        $array[] = new DatosConexion("local","","","","");
        return $array;
    }
}