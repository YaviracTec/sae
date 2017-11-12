<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/ControladorRequisito.php');
class RouterRequisito extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorRequisito();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "borrar":
            return $this->controlador->borrar($this->datosURI->argumentos["id"]);
            break;
         case "leer":
            return $this->controlador->leer($this->datosURI->argumentos["id"]);
            break;
         case "leer_paginado":
            return $this->controlador->leer_paginado($this->datosURI->argumentos["pagina"],$this->datosURI->argumentos["registros_por_pagina"]);
            break;
         case "leer_filtrado":
            return $this->controlador->leer_filtrado($this->datosURI->argumentos["columna"],$this->datosURI->argumentos["tipo_filtro"],$this->datosURI->argumentos["filtro"]);
            break;
         case "crear":
            return $this->controlador->crear(new Requisito($this->datosURI->argumentos["id"],$this->datosURI->argumentos["idAsignaturaDependiente"],$this->datosURI->argumentos["idAsignaturaIndependiente"],$this->datosURI->argumentos["idTipoRequisito"]));
            break;
         case "actualizar":
            return $this->controlador->actualizar(new Requisito($this->datosURI->argumentos["id"],$this->datosURI->argumentos["idAsignaturaDependiente"],$this->datosURI->argumentos["idAsignaturaIndependiente"],$this->datosURI->argumentos["idTipoRequisito"]));
            break;
      }
   }
}