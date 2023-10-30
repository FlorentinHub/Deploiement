<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;
    protected $policies = [
        User::class => AdminPolicy::class,
    ];
    
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function admin(User $user)
    {
        return $user->isAdmin();
    }

    public function __construct()
    {
        //
    }
}
