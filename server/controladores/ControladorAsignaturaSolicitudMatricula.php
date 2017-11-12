<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/AsignaturaSolicitudMatricula.php');
class ControladorAsignaturaSolicitudMatricula extends ControladorBase
{
   function crear(AsignaturaSolicitudMatricula $asignaturasolicitudmatricula)
   {
      $sql = "INSERT INTO AsignaturaSolicitudMatricula (idSolicitudMatricula,idAsignatura) VALUES ('$asignaturasolicitudmatricula->idSolicitudMatricula','$asignaturasolicitudmatricula->idAsignatura');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(AsignaturaSolicitudMatricula $asignaturasolicitudmatricula)
   {
      $sql = "UPDATE AsignaturaSolicitudMatricula SET idSolicitudMatricula = '$asignaturasolicitudmatricula->idSolicitudMatricula',idAsignatura = '$asignaturasolicitudmatricula->idAsignatura' WHERE id = $asignaturasolicitudmatricula->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM AsignaturaSolicitudMatricula WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM AsignaturaSolicitudMatricula;";
      }else{
         $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE id = $id;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM AsignaturaSolicitudMatricula LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM AsignaturaSolicitudMatricula;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM AsignaturaSolicitudMatricula WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}