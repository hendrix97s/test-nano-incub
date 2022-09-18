<?php

namespace App\Services;

use App\Models\User;

class FuncionarioService
{
  public static function atualizaSaldoAtual(int $funcionarioId, float $valor, string $movimentacaoTipo)
  {
    $funcionario = User::find($funcionarioId);
    if(!$funcionario->hasRole('funcionario')) return false;

    if($movimentacaoTipo == 'entrada'){
      $funcionario->saldo_atual += $valor;
      return $funcionario->save();
    }
     
    $funcionario->saldo_atual -= $valor;
    return $funcionario->save();
  }
}