<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Universidad extends Model
{
    use Notifiable;

    protected $table = 'universidades';

    public function Faculty()
    {
        return $this->hasMany('App\Facultad');
    }

    public function Course()
    {
        return $this->hasMany('App\Curso');
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
