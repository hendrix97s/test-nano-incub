<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
  public function __construct()
  {
    parent::__construct(User::class);
  }

  public function getAllFuncionarios()
  {
    return $this->model
    ->select('users.uuid', 'users.nome', 'users.login', 'users.saldo_atual')
    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    ->where('roles.name', 'funcionario')->paginate(config('settings.paginate_funcionario'));
  }
}