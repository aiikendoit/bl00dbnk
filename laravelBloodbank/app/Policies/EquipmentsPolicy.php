<?php

namespace App\Policies;

use App\Models\User;

class EquipmentsPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        // 
    }

    // Add similar methods for other actions like create, update, delete, etc.
    public function viewAny(User $user)
    {
        return in_array($user->role, ['superadmin', 'admin', 'user']);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['superadmin', 'admin']);
    }

    public function update(User $user)
    {
        return in_array($user->role, ['superadmin', 'admin']);
    }

    public function delete(User $user)
    {
        return in_array($user->role, ['superadmin', 'admin']);
    }
}
