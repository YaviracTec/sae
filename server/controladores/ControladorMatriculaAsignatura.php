<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/MatriculaAsignatura.php');
class ControladorMatriculaAsignatura extends ControladorBase
{
   function crear(MatriculaAsignatura $matriculaasignatura)
   {
      $sql = "INSERT INTO MatriculaAsignatura (idMatricula,idAsignatura) VALUES ('$matriculaasignatura->idMatricula','$matriculaasignatura->idAsignatura');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(MatriculaAsignatura $matriculaasignatura)
   {
      $sql = "UPDATE MatriculaAsignatura SET idMatricula = '$matriculaasignatura->idMatricula',idAsignatura = '$matriculaasignatura->idAsignatura' WHERE id = $matriculaasignatura->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM MatriculaAsignatura WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM MatriculaAsignatura;";
      }else{
         $sql = "SELECT * FROM MatriculaAsignatura WHERE id = $id;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leerPaginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina)+1;
      $sql ="SELECT * FROM MatriculaAsignatura LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM MatriculaAsignatura WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM MatriculaAsignatura WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MatriculaAsignatura WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MatriculaAsignatura WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}