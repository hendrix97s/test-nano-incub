@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-4 w-full h-full bg-white rounded-xl relative">
    <div class="py-3 px-5 pl-6  w-full h-[48px] bg-gray-100 rounded-t-xl">Extrato - {{$funcionario->nome}}</div>
      <!-- breadcrumb -->
    <nav class="ml-5" aria-label="Breadcrumb">
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
            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
              Extrato
            </span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="overflow-x-auto relative w-[97%] ml-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">Data de criação</th>
                    <th scope="col" class="py-3 px-6">Observação</th>
                    <th scope="col" class="py-3 px-6">tipo</th>
                    <th scope="col" class="py-3 px-6">valor R$</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($extrato as $value)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$value->data_criacao}}
                      </th>
                      <td class="py-4 px-6">
                        {{$value->observacao}}
                      </td>
                      <td class="py-4 px-6">
                        {{$value->tipo_movimentacao}}
                      </td>

                      <td class="py-4 px-6">
                        R$ {{$value->valor}}
                      </td>
                  </tr>
              @endforeach
            </tbody>
        </table>
    </div>

    <div class="absolute bottom-8 left-6">
      <div class="flex flex-row gap-2">
        @if($extrato->currentPage() > 1)
          <a href="{{ $extrato->url(1) }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50"><i class="fa-solid fa-angles-left"></i></a>
          <a href="{{ $extrato->previousPageUrl() }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50"><i class="fa-solid fa-angle-left"></i></a>
        @endif

        @for($i=1; $i<=$extrato->lastPage(); $i++) 
          @if($i== $extrato->currentPage()) 
            <a class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors bg-slate-800 text-gray-50">{{ $i }}</a>
          @else
            <a href="{{ $extrato->url($i) }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">{{ $i }}</a>
          @endif
        @endfor

        @if($extrato->currentPage() < $extrato->lastPage())
          <a href="{{ $extrato->nextPageUrl() }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">
            <i class="fa-solid fa-angle-right"></i>
          </a>
          <a href="{{ $extrato->url($extrato->lastPage()) }}" class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">
            <i class="fa-solid fa-angles-right"></i>
          </a>
        @endif
      </div>
    </div>

                <!-- buttom create -->
    <div class="flex justify-end items-center absolute right-4 bottom-4">
      <a href="{{route('movimentacoes.create', $funcionario->uuid)}}" class="flex items-center justify-center w-10 h-10 rounded-full bg-green-500 hover:bg-green-600 text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
      </a>
    </div>
</div>


@endsection