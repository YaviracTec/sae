<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/PeriodoLectivo.php');
class ControladorPeriodoLectivo extends ControladorBase
{
   function crear(PeriodoLectivo $periodolectivo)
   {
      $sql = "INSERT INTO PeriodoLectivo (descripcion,fechaInicio,fechaFin,matriculable,codigo) VALUES (?,?,?,?,?);";
      $parametros = array($periodolectivo->descripcion,$periodolectivo->fechaInicio,$periodolectivo->fechaFin,$periodolectivo->matriculable,$periodolectivo->codigo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(PeriodoLectivo $periodolectivo)
   {
      $parametros = array($periodolectivo->descripcion,$periodolectivo->fechaInicio,$periodolectivo->fechaFin,$periodolectivo->matriculable,$periodolectivo->codigo,$periodolectivo->id);
      $sql = "UPDATE PeriodoLectivo SET descripcion = '$periodolectivo->?',fechaInicio = '$periodolectivo->?',fechaFin = '$periodolectivo->?',matriculable = '$periodolectivo->?',codigo = '$periodolectivo->?' WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM PeriodoLectivo WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM PeriodoLectivo;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM PeriodoLectivo WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $parametros = array($desde,$registrosPorPagina);
      $sql ="SELECT * FROM PeriodoLectivo LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM PeriodoLectivo;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $sql = "SELECT * FROM PeriodoLectivo WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM PeriodoLectivo WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM PeriodoLectivo WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM PeriodoLectivo WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}