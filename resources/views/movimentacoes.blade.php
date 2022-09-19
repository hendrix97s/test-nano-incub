@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-4 w-full h-full bg-white rounded-xl relative">
    <div class="py-3 px-5 pl-6  w-full h-[48px] bg-gray-100 rounded-t-xl">Movimentações</div>

    <div class="overflow-x-auto relative w-[95%] h-[80%] ml-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6"># ID</th>
                    <th scope="col" class="py-3 px-6">Data de criação</th>
                    <th scope="col" class="py-3 px-6">Tipo</th>
                    <th scope="col" class="py-3 px-6">Observação</th>
                    <th scope="col" class="py-3 px-6">valor R$</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($movimentacoes as $registro)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$registro->id}}
                </th>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$registro->data_criacao}}
                </td>
                <td class="py-4 px-6">
                  {{$registro->tipo_movimentacao}}
                </td>
                <td class="py-4 px-6">
                  {{$registro->observacao}}
                </td>

                <td class="py-4 px-6">
                  R$ {{$registro->valor}}
                </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>

    <div class=" absolute bottom-8 left-6">
      <div class="flex flex-row gap-2">
        @if($movimentacoes->currentPage() > 1)
          <a href="{{ $movimentacoes->url(1) }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50"><i class="fa-solid fa-angles-left"></i></a>
          <a href="{{ $movimentacoes->previousPageUrl() }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50"><i class="fa-solid fa-angle-left"></i></a>
        @endif

        @for($i=1; $i<=$movimentacoes->lastPage(); $i++) 
          @if($i== $movimentacoes->currentPage()) 
            <a class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors bg-slate-800 text-gray-50">{{ $i }}</a>
          @else
            <a href="{{ $movimentacoes->url($i) }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">{{ $i }}</a>
          @endif
        @endfor

        @if($movimentacoes->currentPage() < $movimentacoes->lastPage())
          <a href="{{ $movimentacoes->nextPageUrl() }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">
            <i class="fa-solid fa-angle-right"></i>
          </a>
          <a href="{{ $movimentacoes->url($movimentacoes->lastPage()) }}" class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">
            <i class="fa-solid fa-angles-right"></i>
          </a>
        @endif
      </div>
    </div>

</div>

@endsection