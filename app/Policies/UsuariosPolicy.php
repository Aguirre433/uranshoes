<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Usuarios;
use Illuminate\Auth\Access\Response;

class UsuariosPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $user, Usuarios $usuarios): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $user, Usuarios $usuarios): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $user, Usuarios $usuarios): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $user, Usuarios $usuarios): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $user, Usuarios $usuarios): bool
    {
        return false;
    }
}
