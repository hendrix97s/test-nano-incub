@extends('layouts.app')

@section('content')
  
<div class="flex w-full h-screen p-4">
  <div class="menu relative flex flex-col w-72 h-full rounded-xl bg-slate-800">
    <div class="avatar flex items-center gap-2 w-full h-32 px-7 rounded-t-xl">
      <img class="w-14 rounded-full shadow-xl" src="{{asset('storage/img/avatar/luiz.jpeg')}}" alt="avatar">
      <div>
        <h1 class="text-xl font-bold text-white">{{auth()->user()->nome}}</h1>
        <p class="text-sm text-gray-300">{{auth()->user()->login}}</p>
      </div>
    </div>
    
    <div>
      <ul class="pt-5 border-t border-gray-700">
        <li>
          <a href="#" class="flex items-center gap-2 px-7 py-2 text-white hover:bg-slate-700 transition-colors ">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="#" class="flex items-center gap-2 px-7 py-2 text-white hover:bg-slate-700 transition-colors ">
          <i class="fa-solid fa-money-bill-transfer"></i>
            <span>Movimentação</span>
          </a>
        </li>

        <li>
          <a href="#" class="flex items-center gap-2 px-7 py-2 text-white hover:bg-slate-700 transition-colors ">
            <i class="fas fa-home"></i>
            <span>Funcionários</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="absolute bottom-0 w-full">
      <a href="{{route('logout')}}" class="flex items-center gap-2 px-7 py-2 text-white bg-slate-700 hover:bg-red-600 transition-colors  rounded-b-xl">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
          <span>Sair</span>
        </a>
    </div>
  </div>
</div>

@endsection