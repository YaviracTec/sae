import { LoginResult } from '../../entidades/especifico/Login-Result';
import { Component, OnInit } from '@angular/core';
// SERVICIOS
import { GeneroService } from 'app/CRUD/genero/genero.service';
import { EtniaService } from 'app/CRUD/etnia/etnia.service';
import { TipoIngresosService } from 'app/CRUD/tipoingresos/tipoingresos.service';
import { OcupacionService } from 'app/CRUD/ocupacion/ocupacion.service';
import { TipoDiscapacidadService } from 'app/CRUD/tipodiscapacidad/tipodiscapacidad.service';
import { TipoSangreService } from 'app/CRUD/tiposangre/tiposangre.service';
import { EstadoCivilService } from 'app/CRUD/estadocivil/estadocivil.service';
import { TituloService } from 'app/CRUD/titulo/titulo.service';
import { EstudianteService } from 'app/CRUD/estudiante/estudiante.service';
import { TipoInstitucionProcedenciaService } from 'app/CRUD/tipoinstitucionprocedencia/tipoinstitucionprocedencia.service';
import { NivelTituloService } from 'app/CRUD/niveltitulo/niveltitulo.service';
import { UbicacionService } from 'app/CRUD/ubicacion/ubicacion.service';
// ENTIDADES
import { Persona } from 'app/entidades/CRUD/Persona';
import { Genero } from 'app/entidades/CRUD/Genero';
import { Etnia } from 'app/entidades/CRUD/Etnia';
import { TipoIngresos } from 'app/entidades/CRUD/TipoIngresos';
import { Ocupacion } from 'app/entidades/CRUD/Ocupacion';
import { TipoDiscapacidad } from 'app/entidades/CRUD/TipoDiscapacidad';
import { TipoSangre } from 'app/entidades/CRUD/TipoSangre';
import { EstadoCivil } from 'app/entidades/CRUD/EstadoCivil';
import { Titulo } from 'app/entidades/CRUD/Titulo';
import { TipoInstitucionProcedencia } from 'app/entidades/CRUD/TipoInstitucionProcedencia';
import { NivelTitulo } from 'app/entidades/CRUD/NivelTitulo';
import { Ubicacion } from 'app/entidades/CRUD/Ubicacion';
@Component({
    selector: 'app-perfil',
    templateUrl: './perfil.component.html',
    styleUrls: ['./perfil.component.scss']
})
export class PerfilComponent implements OnInit {
    busy: Promise<any>;
    personaLogeada: Persona;
    generos: Genero[];
    etnias: Etnia[];
    tiposIngresos: TipoIngresos[];
    tiposSangre: TipoSangre[];
    estadosCivil: EstadoCivil[];
    titulos: Titulo[];
    tiposInstitucionProcedencia: TipoInstitucionProcedencia[];
    nivelesTitulo: NivelTitulo[];
    ubicaciones: Ubicacion[];
    ocupaciones: Ocupacion[];
    tiposDiscapacidad: TipoDiscapacidad[];

    constructor(private generoDataService: GeneroService,
        private estadoCivilDataService: EstadoCivilService,
        private etniaDataService: EtniaService,
        private tipoSangreDataService: TipoSangreService,
        private ingresosDataService: TipoIngresosService,
        private ocupacionDataService: OcupacionService,
        private tipoDiscapacidadDataService: TipoDiscapacidadService,
        private ubicacionDataService: UbicacionService,
        private nivelTituloDataService: NivelTituloService,
        private estudianteDataService: EstudianteService,
        private tipoInstitucionProcedenciaService: TipoInstitucionProcedenciaService) {
    }

    ngOnInit() {
        let logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
        this.personaLogeada = logedResult.persona;
        this.busy = this.generoDataService.getAll()
        .then(respuesta => {
            this.generos=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.estadoCivilDataService.getAll()
        .then(respuesta => {
            this.estadosCivil=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.etniaDataService.getAll()
        .then(respuesta => {
            this.etnias=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.tipoSangreDataService.getAll()
        .then(respuesta => {
            this.tiposSangre=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.ingresosDataService.getAll()
        .then(respuesta => {
            this.tiposIngresos=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.ocupacionDataService.getAll()
        .then(respuesta => {
            this.ocupaciones=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.tipoDiscapacidadDataService.getAll()
        .then(respuesta => {
            this.tiposDiscapacidad=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getAll()
        .then(respuesta => {
            this.ubicaciones=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.nivelTituloDataService.getAll()
        .then(respuesta => {
            this.nivelesTitulo=respuesta;
        })
        .catch(error => {

        });
        this.busy = this.tipoInstitucionProcedenciaService.getAll()
        .then(respuesta => {
            this.tiposInstitucionProcedencia=respuesta;
        })
        .catch(error => {

        });
    }
}
