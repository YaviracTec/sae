<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Asignatura.php');
class ControladorAsignatura extends ControladorBase
{
   function crear(Asignatura $asignatura)
   {
      $sql = "INSERT INTO Asignatura (idMalla,codigo,nombre,nivel,idDocumentoPea,horasSemana,horasPractica,horasDocente,horasAutonomas) VALUES (?,?,?,?,?,?,?,?,?);";
      $parametros = array($asignatura->idMalla,$asignatura->codigo,$asignatura->nombre,$asignatura->nivel,$asignatura->idDocumentoPea,$asignatura->horasSemana,$asignatura->horasPractica,$asignatura->horasDocente,$asignatura->horasAutonomas);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Asignatura $asignatura)
   {
      $parametros = array($asignatura->idMalla,$asignatura->codigo,$asignatura->nombre,$asignatura->nivel,$asignatura->idDocumentoPea,$asignatura->horasSemana,$asignatura->horasPractica,$asignatura->horasDocente,$asignatura->horasAutonomas,$asignatura->id);
      $sql = "UPDATE Asignatura SET idMalla = ?,codigo = ?,nombre = ?,nivel = ?,idDocumentoPea = ?,horasSemana = ?,horasPractica = ?,horasDocente = ?,horasAutonomas = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Asignatura WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Asignatura;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Asignatura WHERE id = ?;";
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
      $sql ="SELECT * FROM Asignatura LIMIT ?,?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT ceil(count(*)/$registrosPorPagina)as'paginas' FROM Asignatura;";
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
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}