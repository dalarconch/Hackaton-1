<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Curso extends Model
{
    use Notifiable;

    protected $table = 'cursos';

    //Se deben crear dos funciones para cada FK que tenga la tabla. Una por cada una.
    //Llave Foránea de la Facultad
    public function Faculty()
    {
        return $this->belongsTo('App\Facultad', 'id_facultad');
    }

    //Llave foránea de la universidad
    public function University()
    {
        return $this->belongsTo('App\Universidad', 'id_universidad');
    }

    public function Carrera()
    {
        return $this->belongsTo('App\Carreras', 'id_carrera');
    }

    public function Project()
    {
        return $this->hasMany('App\Proyecto');
    }

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
