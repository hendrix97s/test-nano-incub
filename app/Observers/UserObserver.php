<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user)
    {
      $user->saldo_atual = 0;
    }

    public function created(User $user)
    {
      $user->assignRole('funcionario');
    }
}
