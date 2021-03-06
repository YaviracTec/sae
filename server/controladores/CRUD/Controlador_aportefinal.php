<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/AporteFinal.php');
class Controlador_aportefinal extends Controlador_Base
{
   function crear($args)
   {
      $aportefinal = new AporteFinal($args["id"],$args["idCategoriaAporte"],$args["idMatriculaAsignatura"],$args["nota"]);
      $sql = "INSERT INTO AporteFinal (idCategoriaAporte,idMatriculaAsignatura,nota) VALUES (?,?,?);";
      $parametros = array($aportefinal->idCategoriaAporte,$aportefinal->idMatriculaAsignatura,$aportefinal->nota);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $aportefinal = new AporteFinal($args["id"],$args["idCategoriaAporte"],$args["idMatriculaAsignatura"],$args["nota"]);
      $parametros = array($aportefinal->idCategoriaAporte,$aportefinal->idMatriculaAsignatura,$aportefinal->nota,$aportefinal->id);
      $sql = "UPDATE AporteFinal SET idCategoriaAporte = ?,idMatriculaAsignatura = ?,nota = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar($args)
   {
      $id = $args["id"];
      $parametros = array($id);
      $sql = "DELETE FROM AporteFinal WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($args)
   {
      $id = $args["id"];
      if ($id==""){
         $sql = "SELECT * FROM AporteFinal;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM AporteFinal WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM AporteFinal LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM AporteFinal;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado($args)
   {
      $nombreColumna = $args["columna"];
      $tipoFiltro = $args["tipo_filtro"];
      $filtro = $args["filtro"];
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM AporteFinal WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM AporteFinal WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM AporteFinal WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM AporteFinal WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}