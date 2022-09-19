<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovimentacaoRequest;
use App\Http\Requests\UpdateMovimentacaoRequest;
use App\Models\Movimentacao;
use App\Repositories\MovimentacaoRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, MovimentacaoRepository $repository)
    {
      if($request->nome != null or $request->nome != '') {
        $movimentacoes = $repository->movimentacoesByNomeFuncionario($request->nome)->paginate(config('settings.paginate_movimentacao'));
      } else {
        $movimentacoes = $repository->movimentacoes()->paginate(30);
      }

      return view('movimentacoes', compact('movimentacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(string $uuid, UserRepository $repository)
    {
      $funcionario = $repository->findByUuid($uuid);
      return view('movimentacao', compact('funcionario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovimentacaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovimentacaoRequest $request, MovimentacaoRepository $repository)
    {
      $data = $request->validated();
      $funcionarioRepository = new UserRepository();
      $funcionario = $funcionarioRepository->findByUuid($request->uuid);
      $data['funcionario_id'] = $funcionario->id;
      $repository->create($data);
      return redirect()->route('funcionarios.extrato', $request->uuid);
    }
}
