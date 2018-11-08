<?php

namespace App;

trait HasRoles
{
    /**
     * Un usuario puede tener multiples roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Asigna el Rol al usuario
     *
     * @param  string $role
     *
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    /**
     * Determina si el usuario tiene el rol asignado
     *
     * @param  mixed $role
     *
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        if (is_array($role)) {
            foreach ($role as $r) {
                if ($this->hasRole($r)) {
                    return true;
                }
            }

            return false;
        }

        return !!$role->intersect($this->roles)->count();
    }

    /**
    Verifica que el Rol del usuario actual esté autorizado y exista. Sino, envía un mensaje de exepcion
    **/

    public function authorizeRoles($role){
        if($this->hasRole($role)){
            return true;
        }
        abort(401,'Esta acción no está autorizada'); /** Redirecciona a la vista errors/401.blade.php**/
    }


    /**
     * Determine if the user may perform the given permission.
     *
     * @param  Permission $permission
     *
     * @return boolean
     */
    public function hasPermission(Permission $permission)
    {
        return $this->hasRole($permission->roles);
    }
}
