<?php

namespace App\Observers;

use App\Models\Movimentacao;
use App\Services\FuncionarioService;

class MovimentacaoObserver
{

  public function creating(Movimentacao $movimentacao)
  {
    $movimentacao->administrador_id = auth()->user()->id;
  }

  public function created(Movimentacao $movimentacao)
  {
    FuncionarioService::atualizaSaldoAtual($movimentacao->funcionario_id, $movimentacao->valor, $movimentacao->tipo_movimentacao);
  }

}
