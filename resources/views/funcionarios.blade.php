@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-4 w-full h-full bg-white rounded-xl">
    <div class="py-3 px-5 pl-6  w-full h-[48px] bg-gray-100 rounded-t-xl">Funcionários</div>

    <div class="search ">
      <form action="{{ route('funcionarios.index') }}" method="get" class="rounded-xl bg-white pl-6">
          <div class="form-group mb-3 flex gap-2">
            <select name="type" id="type" class="form-select appearance-none block w-52 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" required>
                <option value="nome" selected>Nome</option>
                <option value="data_criacao">Data de cadastro</option>
            </select>
            
            <input type="text" name="value" id="value" class="form-control block w-52 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  placeholder="Pesquisar"/>
            <button type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-4 bg-blue-600 text-white text-lg leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            
            <a href="{{ route('funcionarios.index') }}" class="flex items-center inline-block px-4 bg-gray-500 text-white text-lg leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
              <i class="fa-solid fa-refresh"></i>
            </a>

          </div>
      </form>
    </div>

    <div class="flex flex-col  gap-4  cards  pl-6 pr-6 pb-6">
      @foreach ($funcionarios as $funcionario)
        <div class="flex gap-2 card shadow hover:bg-slate-800  text-slate-800 hover:text-gray-50 cursor-pointer  transition-colors rounded-xl p-3 w-3/6 min-w-min">
          <div class="flex justify-center items-center w-24 h-full">
            <img class="w-16 rounded-full shadow-xl" src="{{asset('storage/img/avatar/avatar-male.png')}}" alt="avatar">
          </div>
          <div  class="card-bodyflex flex-col justify-center mt-1 w-96 h-full">
            <h2 class="card-title font-semibold">{{ $funcionario->nome }}</h2>
            <p  class="card-text">Saldo atual: R$ {{ $funcionario->saldo_atual }}</p>
            <p  class="card-text">Data de criação: {{ $funcionario->data_criacao->format('d/m/Y') }}</p>
          </div>
          
          <div class="w-80 relative">
            <a href="{{ route('funcionarios.extrato', $funcionario->uuid) }}" class="card-link absolute   top-0 right-2">

            <i class="fa-solid fa-money-bill-transfer"></i>
            </a>
            <!-- remover funcionario -->
            <form action="{{ route('funcionarios.destroy', $funcionario->uuid) }}" method="post" class="absolute bottom-6 right-[10px]">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>

            <a href="{{ route('funcionarios.edit', $funcionario->uuid) }}" class="card-link absolute bottom-0 right-2">
              <i class="fa-regular fa-pen-to-square"></i>
            </a>
          </div>
        </div>
      @endforeach

      @if(!$funcionarios->count())
        Nenhum funcionário encontrado :(
      @else
        <div class="w-full absolute bottom-8">
          <div class="flex flex-row gap-2">
            @if($funcionarios->currentPage() > 1)
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

            @if($funcionarios->currentPage() < $funcionarios->lastPage())
              <a href="{{ $funcionarios->nextPageUrl() }}"  class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">
                <i class="fa-solid fa-angle-right"></i>
              </a>
              <a href="{{ $funcionarios->url($funcionarios->lastPage()) }}" class="flex items-center justify-center w-8 h-8 rounded-lg border p-2 transition-colors hover:bg-slate-800 hover:text-gray-50">
                <i class="fa-solid fa-angles-right"></i>
              </a>
            @endif
          </div>
        </div>
      @endif

            <!-- buttom create -->
      <div class="flex justify-end items-center absolute right-8 bottom-4">
        <a href="{{route('funcionarios.create')}}" class="flex items-center justify-center w-10 h-10 rounded-full bg-green-500 hover:bg-green-600 text-white">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        </a>
      </div>
  </div>
</div>

<script>
  // mudar valor do type do campo de pesquisa
  document.getElementById('type').addEventListener('change', function() {
    value = (this.value == 'nome') ? 'text' : 'date';
    document.getElementById('value').setAttribute('type', value);
  });
</script>
@endsection