<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Proyecto extends Model
{
    use Notifiable;

    protected $table = 'proyectos';

    public function Faculty()
    {
        return $this->belongsTo('App\Facultad', 'id_facultad');
    }

    //Llave foránea de la universidad
    public function University()
    {
        return $this->belongsTo('App\Universidad', 'id_universidad');
    }

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
