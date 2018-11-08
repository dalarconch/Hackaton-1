<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArchivoRequest extends FormRequest
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
            'nombre_archivo' => 'required',
            'pdf' => 'required'
        ];
    }
}
