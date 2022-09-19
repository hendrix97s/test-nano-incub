<?php

namespace App\Http\Controllers;

use App\Repositories\MovimentacaoRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(MovimentacaoRepository $repository)
  {
    $saidas = $repository->getQuantidadePorAnoMes('saida');
    $entradas = $repository->getQuantidadePorAnoMes('entrada');
    return view('dashboard', compact('entradas', 'saidas'));
  }
}
