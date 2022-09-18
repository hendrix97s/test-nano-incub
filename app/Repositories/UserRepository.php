<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UserRepository extends BaseRepository
{
  public function __construct()
  {
    parent::__construct(User::class);
  }

  public function getAllFuncionarios()
  {
    $funcionario = $this->model
      ->select('users.id','users.uuid', 'users.nome', 'users.login', 'users.saldo_atual', 'users.data_criacao')
      ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
      ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
      ->where('roles.name', 'funcionario');

      // dd($funcionario, ($funcionario instanceof Builder));
    return $funcionario;
  }

  public function getFuncioarioByDataCriacao($data)
  {
    $funcionario = $this->getAllFuncionarios()
      ->whereDate('users.data_criacao', $data);
    return $funcionario;
  }

  public function getFuncionarioByName($name){
    $funcionario = $this->getAllFuncionarios()
      ->where('users.nome', 'like', '%'.$name.'%');
    return $funcionario;
  }
}