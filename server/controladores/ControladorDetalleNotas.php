<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/DetalleNotas.php');
class ControladorDetalleNotas extends ControladorBase
{
   function crear(DetalleNotas $detallenotas)
   {
      $sql = "INSERT INTO DetalleNotas (descripcion,nota,idCateogiraNota,idNota) VALUES (?,?,?,?);";
      $parametros = array($detallenotas->descripcion,$detallenotas->nota,$detallenotas->idCateogiraNota,$detallenotas->idNota);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(DetalleNotas $detallenotas)
   {
      $parametros = array($detallenotas->descripcion,$detallenotas->nota,$detallenotas->idCateogiraNota,$detallenotas->idNota,$detallenotas->id);
      $sql = "UPDATE DetalleNotas SET descripcion = ?,nota = ?,idCateogiraNota = ?,idNota = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM DetalleNotas WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM DetalleNotas;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM DetalleNotas WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM DetalleNotas LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM DetalleNotas;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM DetalleNotas WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}