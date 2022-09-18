<?php

namespace App\Repositories;

use App\Models\Movimentacao;

class MovimentacaoRepository extends BaseRepository
{
  public function __construct()
  {
    parent::__construct(Movimentacao::class);
  }
}