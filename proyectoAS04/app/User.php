<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    // public function authorizeRoles(){
    //     if($this->hasRole($roles)){
    //         return true;
    //     }
    //     abort(401,'Esta acción no está autorizada');
    // }

    // public function hasRole($role)
    // {
    //     if($this->roles()->where('name',$role)->first()){ /*Busca el rol. Si encuentra el primero retorna un verdadero. validacion de roles.*/
    //         return true;
    //     }
    //     return false; /* De lo contrario, se devuelve un FALSE*/ 
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rut','rol', 'nombre', 'email', 'password', 'universidad', 'carrera'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
