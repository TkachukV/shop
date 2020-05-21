<?php

namespace App\Repositories;

use App\Models\User;

class UserRepositories
{

    public function saveUser(User $user)
    {
        if ($user->save()) {

            return true;
        }

        return false;
    }

}
