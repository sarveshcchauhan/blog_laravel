<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any admins.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if($permission->id == 17){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function update(Admin $user)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if($permission->id == 18){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function delete(Admin $user)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if($permission->id == 19){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function restore(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }
}
