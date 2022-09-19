<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
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

  public function create(UserRepository $repository)
  {
    $resource = 'create';
    return view('funcionario', compact('resource'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function store(UpdateUserRequest $request, UserRepository $repository)
  {
    $repository->create($request->validated());
    return redirect()->route('funcionarios.index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(string $uuid, UserRepository $repository)
  {
    $resource = 'update';
    $funcionario = $repository->findByUuid($uuid);
    return view('funcionario', compact('funcionario', 'resource'));
  }

  /**
   * Atualiza um funcionário ou administrador
   *
   * @param UpdateUserRequest $request
   * @param UserRepository $repository
   * @return void
   */
  public function update(UpdateUserRequest $request, UserRepository $repository)
  { 
    $repository->updateByUuid($request->uuid, $request->validated());
    return redirect()->back();
  }

  /**
   * Undocumented function
   *
   * @param string $uuid uuid  do usuário
   * @param UserRepository $repository
   * @return void
   */
  public function destroy(string $uuid, UserRepository $repository)
  {
    $repository->destroyByUuid($uuid);
    return redirect()->route('funcionarios.index');
  }
}
