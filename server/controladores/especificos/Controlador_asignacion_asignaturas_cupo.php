<?php
include_once('../controladores/Controlador_Base.php');
class Controlador_asignacion_asignaturas_cupo extends Controlador_Base
{
    function consultar($args)
   { 
        $idJornada = $args["idJornada"];
        $idCarrera = $args["idCarrera"];
        $idPersona = $args["idPersona"];
        $sql = "SELECT Persona.id as 'idPersona', CONCAT(Persona.nombre1, ' ', Persona.nombre2, ' ', Persona.apellido1, ' ', Persona.apellido2) as 'nombreCompleto', Asignatura.id as 'idAsignatura', Asignatura.codigo as 'codigoAsignatura', Asignatura.horasSemana, Asignatura.nombre 'nombreAsignatura', Asignatura.nivel FROM Persona INNER JOIN Cupo ON Cupo.idPersona = Persona.id INNER JOIN AsignaturaCupo ON AsignaturaCupo.idCupo = Cupo.id INNER JOIN Asignatura ON AsignaturaCupo.idAsignatura = Asignatura.id INNER JOIN JornadaCarrera ON Cupo.idJornadaCarrera = JornadaCarrera.id INNER JOIN Carrera ON Carrera.id = JornadaCarrera.idCarrera INNER JOIN Jornada ON Jornada.id = JornadaCarrera.idJornada INNER JOIN PeriodoLectivo ON PeriodoLectivo.id = Cupo.idPeriodoLectivo WHERE PeriodoLectivo.matriculable = 1;";
        $parametros = array();
        if(!($idJornada == 0)){
            $sql = trim($sql, ';');
            $sql .= " AND Jornada.id = ?;";
            array_push($parametros, $idJornada);
        }
        if(!($idCarrera == 0)){
            $sql = trim($sql, ';');
            $sql .= " AND Carrera.id = ?;";
            array_push($parametros, $idCarrera);
        }
        if(!($idPersona == 0)){
            $sql = trim($sql, ';');
            $sql .= " AND Persona.id = ?;";
            array_push($parametros, $idPersona);
        }
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }
   }
}