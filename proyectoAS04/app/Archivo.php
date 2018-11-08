<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Notifications\Notifiable;

class Archivo extends Model
{
    use Notifiable;

    //protected $fillable = ['nombre_archivo','informacion_adicional','pdf']; //campos especificados para poder actualizar un archivo. Se debe especificar que campos se actualizaran

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','pdf','nombre_archivo','informacion_adicional',
    ];
}
