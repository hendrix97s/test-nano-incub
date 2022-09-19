@extends('layouts.app')

@section('content')


<div class="flex flex-col justify-center items-center w-screen h-screen">
    @if($errors)
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    <form action="{{ route('login') }}" method="post" class="rounded-xl bg-white p-5">
        @csrf
        <div class="form-group mb-3">
          <label for="login" class="form-label inline-block mb-2 text-gray-700">Login</label>
          <input type="text" name="login" id="login" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  placeholder="{{__('auth.form.placeholder.login')}}"/>
        </div>


        <div class="form-group mb-3">
          <label for="senha" class="form-label inline-block mb-2 text-gray-700">Senha</label>
          <input type="password" name="senha" id="senha" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  placeholder="{{__('auth.form.placeholder.senha')}}"/>
        </div>
        
        <div class="form-group">
            <button type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Logar</button>
        </div>
    </form>
</div>

@endsection