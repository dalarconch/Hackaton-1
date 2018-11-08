<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProyectosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //la funcion de autorizar se puede realizar de forma externa. Se ha cambiado de false a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() //Devuelve un array con reglas
    {
        return [ //Validacion de campos requeridos para subir un Archivo nuevo
            'nombre_proyecto' => 'required',
            'id_profesor' => 'required',
            //'id_universidad' => 'required',
            'anio' => 'required',
            'ramo' => 'required',
            // 'complejidad' => 'required',
            // 'duracion' => 'required',
            // 'sectorsocio' => 'required',

            // 'cantidad_alumnos' => 'required',
            // 'visible' => 'required',
            // 'evaluaciones' => 'required',
            // 'porcentaje' => 'required',

            // 'resumen' => 'required',

            // 'estado' => 'required',
            // 'nombre_archivo' => 'required',
            // 'nombre_extension' => 'required',
            // 'encuesta_archivo' => 'required',
            // 'encuesta_extension' => 'required'
        ];
    }
}
