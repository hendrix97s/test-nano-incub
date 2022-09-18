<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
  public function index(Request $request, UserRepository $repository)
  {
    switch ($request->type) {
      case 'data_criacao':
        $funcionarios = $repository->getFuncioarioByDataCriacao($request->value)->paginate(config('settings.paginate_funcionario'));
        break;
      case 'nome':
        $funcionarios = $repository->getFuncionarioByName($request->value)->paginate(config('settings.paginate_funcionario'));
        break;
      default:
        $funcionarios = $repository->getAllFuncionarios()->paginate(config('settings.paginate_funcionario'));
        break;
      }
      
      return view('funcionarios', compact('funcionarios'));
  }

  public function show()
  {

  }

  public function create()
  {

  }

  public function store()
  {

  }

  public function edit()
  {

  }

  public function update()
  {

  }

  public function destroy($uuid, UserRepository $repository)
  {
    $repository->destroyByUuid($uuid);
    return redirect()->route('funcionario.index');
  }
}
