<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Asignatura.php');
class Controladorasignatura extends ControladorBase
{
   function crear(Asignatura $asignatura)
   {
      $sql = "INSERT INTO Asignatura (idMalla,codigo,nombre,nivel,idDocumentoPea,horasSemana,horasPractica,horasDocente,horasAutonomas,) VALUES (?,?,?,?,?,?,?,?,?,);";
      $parametros = array($asignatura->idMalla,$asignatura->codigo,$asignatura->nombre,$asignatura->nivel,$asignatura->idDocumentoPea,$asignatura->horasSemana,$asignatura->horasPractica,$asignatura->horasDocente,$asignatura->horasAutonomas);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Asignatura $asignatura)
   {
      $parametros = array($asignatura->idMalla,$asignatura->codigo,$asignatura->nombre,$asignatura->nivel,$asignatura->idDocumentoPea,$asignatura->horasSemana,$asignatura->horasPractica,$asignatura->horasDocente,$asignatura->horasAutonomas,$asignatura->id);
      $sql = "UPDATE Asignatura SET idMalla = ?,codigo = ?,nombre = ?,nivel = ?,idDocumentoPea = ?,horasSemana = ?,horasPractica = ?,horasDocente = ?,horasAutonomas = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Asignatura WHERE id = ?;";
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
         $sql = "SELECT * FROM Asignatura;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Asignatura WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Asignatura LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Asignatura;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Asignatura WHERE $nombreColumna = ?;";
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
      return $respuesta;
   }
}