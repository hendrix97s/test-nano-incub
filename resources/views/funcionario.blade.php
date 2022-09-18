@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-4 w-full h-full bg-white rounded-xl">
    <div class="py-3 px-5  w-full h-[48px] bg-gray-100 rounded-t-xl">Funcionários</div>
    <div class="flex flex-col  gap-4  cards  pl-6 pr-6 pb-6">
      @foreach ($funcionarios as $funcionario)
        <div class="flex gap-2 card shadow hover:bg-slate-800  text-slate-800 hover:text-gray-50 cursor-pointer  transition-colors rounded-xl p-3 w-3/6 min-w-min">
          <div class="flex justify-center items-center w-24 h-full">
            <img class="w-16 rounded-full shadow-xl" src="{{asset('storage/img/avatar/avatar-male.png')}}" alt="avatar">
          </div>
          <div  class="card-bodyflex flex-col justify-center mt-1 w-96 h-full">
            <h5 class="card-title font-semibold"># {{ $funcionario->id }}</h5>
            <h5 class="card-title font-semibold">Nome: {{ $funcionario->nome }}</h5>
            <p  class="card-text">Saldo atual: R$ {{ $funcionario->saldo_atual }}</p>
            <p  class="card-text">Data de criação: {{ $funcionario->data_criacao->format('d/m/Y') }}</p>
          </div>
          
          <div class="w-80 relative">
            <a href="{{ route('funcionario.show', $funcionario->uuid) }}" class="card-link absolute bottom-0 right-2">
              <i class="fa-solid fa-eye"></i>
            </a>
          </div>
        </div>
      @endforeach

      <div class="w-full">
        <div class="flex flex-row gap-2">
          @if($funcionarios->currentPage() != 1)
            <a href="{{ $funcionarios->url(1) }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50"><i class="fa-solid fa-angles-left"></i></a>
            <a href="{{ $funcionarios->previousPageUrl() }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50"><i class="fa-solid fa-angle-left"></i></a>
          @endif

          @for($i=1; $i<=$funcionarios->lastPage(); $i++) 
            @if($i== $funcionarios->currentPage()) 
              <a class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors bg-slate-800 text-gray-50">{{ $i }}</a>
            @else
              <a href="{{ $funcionarios->url($i) }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">{{ $i }}</a>
            @endif
          @endfor

          @if($funcionarios->currentPage() != $funcionarios->lastPage())
            <a href="{{ $funcionarios->nextPageUrl() }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">
              <i class="fa-solid fa-angle-right"></i>
            </a>
            <a href="{{ $funcionarios->url($funcionarios->lastPage()) }}" class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">
              <i class="fa-solid fa-angles-right"></i>
            </a>
          @endif
        </div>
      </div>
  </div>
</div>
@endsection