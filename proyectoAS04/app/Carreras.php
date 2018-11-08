<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * 
 */
class Carreras extends Model
{
	use Notifiable;

	protected $table = 'carreras';
	
    public function Faculty()
    {
        return $this->belongsTo('App\Facultad', 'id_facultad');
    }

    //Llave foránea de la universidad
    public function University()
    {
        return $this->belongsTo('App\Universidad', 'id_universidad');
    }

    protected $guarded = [];
}