<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
  public function index(Request $request, UserRepository $repository)
  {
    switch (true) {
      case 'value':
        
        break;
        
      default:
        $funcionarios = $repository->paginate(config('settings.paginate_funcionario'));
        return view('funcionario', compact('funcionarios'));
        break;
    }
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
