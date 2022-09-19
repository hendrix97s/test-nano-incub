@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-4 w-full h-full bg-white rounded-xl">
    <div class="py-3 px-5 pl-6  w-full h-[48px] bg-gray-100 rounded-t-xl relative">
      <span class="font-bold">Funcionário</span> - {{$funcionario->nome}}
    </div>

    <div class="flex justify-center items-center h-full p-5 relative">
      <!-- breadcrumb -->
      <nav class="flex absolute left-6 top-0" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li>
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              <a href="{{route('funcionarios.index')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Funcionários</a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
            </div>
          </li>
        </ol>
      </nav>
      
      <div class="flex items-center justify-center flex-col gap-2 card shadow rounded-xl w-3/6 min-w-min p-5  relative">
        <div class="flex justify-center items-center">
          <img class="w-[200px] rounded-full shadow-xl" src="{{asset('storage/img/avatar/avatar-male.png')}}" alt="avatar">
        </div>    

        <form action="{{route('funcionarios.update', ['uuid' => $funcionario->uuid])}}" method="post" >
          @csrf
          <div class="form-group mb-3">
            <label for="nome" class="form-label inline-block mb-2 text-gray-700">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  placeholder="Nome"
              value="{{ $resource == 'update' ?$funcionario->nome: '' }}">
          </div>

          @if($funcionario->hasRole('administrador'))
            <div class="form-group mb-3">
              <label for="login" class="form-label inline-block mb-2 text-gray-700">Login:</label>
              <input type="email" name="login" id="login" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  placeholder="Login"
              value="{{ $resource == 'update' ?$funcionario->login: '' }}">
            </div>

            <div class="form-group mb-3">
              <label for="senha" class="form-label inline-block mb-2 text-gray-700">Senha:</label>
              <input type="password" name="senha" id="senha" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  placeholder="Senha"
              value="{{ $resource == 'update' ?$funcionario->senha: '' }}">

            </div>

            @else

            <div class="form-group mb-3">
              <label for="saldo" class="form-label inline-block mb-2 text-gray-700">Saldo:</label>
              <input type="number" name="saldo_atual" id="saldo" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  placeholder="{{__('auth.form.placeholder.senha')}}"
              value="{{ $resource == 'update' ?$funcionario->saldo_atual: '' }}">
            </div>
          @endif

          <div class="form-group">
              <button type="submit" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Atualizar</button>
          </div>
        </form>
        
        <h5 class="card-title font-semibold absolute text-4xl text-gray-300 top-8 left-8">#{{ $funcionario->id }}</h5>
      </div>
    </div>
</div>
@endsection