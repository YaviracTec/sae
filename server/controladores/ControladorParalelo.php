<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/Paralelo.php');
class ControladorParalelo extends ControladorBase
{
   function crear(Paralelo $paralelo)
   {
      $sql = "INSERT INTO Paralelo (descripcion) VALUES ('$paralelo->descripcion');";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function actualizar(Paralelo $paralelo)
   {
      $sql = "UPDATE Paralelo SET descripcion = '$paralelo->descripcion' WHERE id = $paralelo->id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function borrar(int $id)
   {
      $sql = "DELETE FROM Paralelo WHERE id = $id;";
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Paralelo;";
      }else{
         $sql = "SELECT * FROM Paralelo WHERE id = $id;";
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
      $sql ="SELECT * FROM Paralelo LIMIT $desde,$registrosPorPagina;";
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
            $sql = "SELECT * FROM Paralelo WHERE $nombreColumna = '$filtro';";
            break;
         case "inicia":
            $sql = "SELECT * FROM Paralelo WHERE $nombreColumna = '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Paralelo WHERE $nombreColumna = '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Paralelo WHERE $nombreColumna = '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql);
      foreach($respuesta as $fila){
         $toReturn[] = $fila;
      }
      return $toReturn;
   }
}