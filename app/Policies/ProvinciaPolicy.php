<?php

namespace App\Policies;

use App\Models\Provincia;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class ProvinciaPolicy
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
    public function view(Usuario $user, Provincia $provincia): bool
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
    public function update(Usuario $user, Provincia $provincia): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $user, Provincia $provincia): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $user, Provincia $provincia): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $user, Provincia $provincia): bool
    {
        return false;
    }
}
