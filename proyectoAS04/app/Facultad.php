<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Facultad extends Model
{
    use Notifiable;

    protected $table = 'facultads';

    public function University()
    {
        return $this->belongsTo('App\Universidad','id_universidad');
    }

    public function Course()
    {
        return $this->hasMany('App\Curso');
    }

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}