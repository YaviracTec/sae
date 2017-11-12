<?php
namespace CRUD\ENTIDADES;
class Titulo
{
   public $id;
   public $idPersona;
   public $idInstitucion;
   public $codigoRegistro;
   public $idNivelTitulo;

   function __construct(int $id,int $idPersona,int $idInstitucion,string $codigoRegistro,int $idNivelTitulo){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->idInstitucion = $idInstitucion;
      $this->codigoRegistro = $codigoRegistro;
      $this->idNivelTitulo = $idNivelTitulo;
   }
}
?>