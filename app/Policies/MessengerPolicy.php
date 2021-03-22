<?php

namespace App\Policies;

use App\Models\Messenger;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessengerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\Admin $admin
     * @return mixed
     */
    public function viewAny($admin)
    {
        $roles = $admin->role;
        foreach ($roles as $role) {
            if ($role == "ALL" || $role == "MESSENGER") {
                return true;
            }
        }
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\Admin $user
     * @param \App\Models\Messenger $messenger
     * @return mixed
     */
    public function view(Admin $user, Messenger $messenger)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\Admin $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\Admin $user
     * @param \App\Models\Messenger $messenger
     * @return mixed
     */
    public function update(Admin $user, Messenger $messenger)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\Admin $user
     * @param \App\Models\Messenger $messenger
     * @return mixed
     */
    public function delete(Admin $user, Messenger $messenger)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\Admin $user
     * @param \App\Models\Messenger $messenger
     * @return mixed
     */
    public function restore(Admin $user, Messenger $messenger)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\Admin $user
     * @param \App\Models\Messenger $messenger
     * @return mixed
     */
    public function forceDelete(Admin $user, Messenger $messenger)
    {
        //
    }
}
