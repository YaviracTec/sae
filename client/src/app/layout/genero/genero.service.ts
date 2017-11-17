import { Injectable } from '@angular/core';
import { Headers, Http } from '@angular/http';
import { environment } from '../../../environments/environment';

import 'rxjs/add/operator/toPromise';

import { Genero } from '../entidades/Genero';

@Injectable()
export class GeneroService {

    private headers = new Headers({ 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*' });
    private urlBase = environment.apiUrl + 'genero';

    constructor(private http: Http) {
    }

    baseUrl(): string {
        return this.urlBase;
    }

    getAll(): Promise<Genero[]> {
        return this.http.get(this.urlBase+'/leer')
            .toPromise()
            .then(response =>
                response.json() as Genero[])
            .catch(this.handleError);
    }

    getPagina(pagina: number, tamanoPagina: number): Promise<Genero[]> {
        return this.http.get(this.urlBase+'/leer_paginado' + '?pagina=' + pagina + '&registrosPorPagina=' + tamanoPagina)
            .toPromise()
            .then(response =>
                response.json() as Genero[])
            .catch(this.handleError);
    }

    getFiltrado(columna: string, tipoFiltro: string, filtro: string): Promise<Genero[]> {
        return this.http.get(this.urlBase+'/leer_filtrado' + '?columna=' + columna + '&tipo_filtro=' + tipoFiltro + '&filtro=' + filtro)
            .toPromise()
            .then(response =>
                response.json() as Genero[])
            .catch(this.handleError);
    }

    getNumeroPaginas(tamanoPagina: number): Promise<number> {
        return this.http.get(this.urlBase+'/numero_paginas' + '?registrosPorPagina=' + tamanoPagina)
            .toPromise()
            .then(response =>
                response.json() as Genero[])
            .catch(this.handleError);
    }

    get(id: number): Promise<Genero> {
        const url = `${this.urlBase+'/leer'}?id=${id}`;
        return this.http.get(url)
            .toPromise()
            .then(response =>
                response.json() as Genero)
            .catch(this.handleError);
    }

    remove(id: number): Promise<boolean> {
        const url = `${this.urlBase+'/borrar'}?id=${id}`;
        return this.http.delete(url, { headers: this.headers })
            .toPromise()
            .then(response =>
                response.json() as boolean)
            .catch(this.handleError);
    }

    create(entidadTransporte: Genero): Promise<Genero> {
        return this.http
            .post(this.urlBase+'/crear', JSON.stringify(entidadTransporte), { headers: this.headers })
            .toPromise()
            .then(res =>
                res.json() as Genero)
            .catch(this.handleError);
    }

    update(entidadTransporte: Genero): Promise<Genero> {
        const url = `${this.urlBase+'/actualizar'}/${entidadTransporte.id}`;
        return this.http
            .put(url, JSON.stringify(entidadTransporte), { headers: this.headers })
            .toPromise()
            .then(res =>
                res.json() as Genero)
            .catch(this.handleError);
    }

    handleError(error: any): Promise<any> {
        console.error('An error occurred', error); // for demo purposes only
        return Promise.reject(error.message || error);
    }
}
