<?php
namespace CRUD\ENTIDADES;
class Estudiante
{
   public $id;
   public $idPersona;
   public $notaPostulacion;
   public $tituloBachiller;
   public $idTipoInstitucionProcedencia;

   function __construct(int $id,int $idPersona,double $notaPostulacion,string $tituloBachiller,int $idTipoInstitucionProcedencia){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->notaPostulacion = $notaPostulacion;
      $this->tituloBachiller = $tituloBachiller;
      $this->idTipoInstitucionProcedencia = $idTipoInstitucionProcedencia;
   }
}
?>