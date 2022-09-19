<?php

namespace App\Repositories;

use App\Models\Movimentacao;
use Illuminate\Support\Facades\DB;

class MovimentacaoRepository extends BaseRepository
{
  public function __construct()
  {
    parent::__construct(Movimentacao::class);
  }

  public function movimentacoes()
  {
    return $this->model      
      ->select('movimentacoes.*', 'users.nome as nome_funcionario')
      ->join('users', 'users.id', '=', 'movimentacoes.funcionario_id')
      ->orderBy('movimentacoes.data_criacao','desc');
  }

  public function movimentacoesByNomeFuncionario($nome)
  {
    return $this->model
      ->select('movimentacoes.*', 'users.nome as nome_funcionario')
      ->join('users', 'users.id', '=', 'movimentacoes.funcionario_id')
      ->where('users.nome', 'like', '%' . $nome . '%')
      ->orderBy('movimentacoes.data_criacao','desc');
  }

  public function getExtratoByFuncionario(int $id)
  {
    return $this->model->where('funcionario_id', $id)->orderBy('data_criacao', 'desc');
  }

  public function removeRelacionamentoPorFuncionario(int $id)
  {
    $this->model->where('funcionario_id', $id)->update(['funcionario_id' => null]);
  }

  public function getQuantidadePorAnoMes($tipo)
  {
    $retorno = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    $movimentacoes = DB::table('movimentacoes')
      ->selectRaw('count(*) as quantidade, year(data_criacao) as ano, month(data_criacao) as mes')
      ->whereRaw('tipo_movimentacao = "'. $tipo.'"')
      ->groupBy('ano', 'mes')
      ->get();

    foreach ($movimentacoes as $registro) {
      $retorno[$registro->mes - 1] = $registro->quantidade;
    }

    return $retorno;
  }
}