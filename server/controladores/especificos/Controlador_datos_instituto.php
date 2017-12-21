<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/especificos/DatosInstituto.php');
class Controlador_datos_instituto extends Controlador_Base
{
   function consultar($args)
   { 
        $idCarrera = $args["idCarrera"];
        $sql = "SELECT Instituto.descripcion as 'nombre', Instituto.rector, Instituto.vicerector, Instituto.color as 'colorCarpeta' FROM Instituto INNER JOIN CarreraInstituto ON CarreraInstituto.idInstituto = Instituto.id INNER JOIN Carrera ON Carrera.id = CarreraInstituto.idCarrera WHERE Carrera.id = ?;";
        $parametros = array($idCarrera);
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}