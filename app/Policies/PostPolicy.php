<?php

namespace App\Policies;

use App\Model\admin\admin;
use App\Model\user\post;
use Illuminate\Auth\Access\HandlesAuthorization;


class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
       foreach ($user->roles as $role) {
           foreach ($role->permissions as $permission) {
                if($permission->id === 13){
                    return true;
                }
           }
           return false;
       }
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function update(Admin $user)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                 if($permission->id === 14){
                     return true;
                 }
            }
            return false;
        }
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                 if($permission->id === 15){
                     return true;
                 }
            }
            return false;
        }
    }

    public function tag(Admin $user){
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                 if($permission->id === 20){
                     return true;
                 }
            }
            return false;
        }
    }

    public function category(Admin $user){
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                 if($permission->id === 21){
                     return true;
                 }
            }
            return false;
        }
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function restore(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }
}
