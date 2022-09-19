<?php

namespace App\Observers;

use App\Models\User;
use App\Repositories\MovimentacaoRepository;

class UserObserver
{
    public function creating(User $user)
    {
      $user->saldo_atual = 0;
    }

    public function created(User $user)
    {
    }

    public function deleting(User $user)
    {
      $user->removeRole('funcionario');
      $repository = new MovimentacaoRepository();
      $repository->removeRelacionamentoPorFuncionario($user->id);
    }
}
