<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
  public function index()
  {
    $funcionarios = $this->userRepository->getAllFuncionarios();
    return view('funcionario.index', compact('funcionarios'));
  }
}
