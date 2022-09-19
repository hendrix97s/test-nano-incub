<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://kit.fontawesome.com/4f1363f62f.js" crossorigin="anonymous"></script>
</head>
<body class="bg-slate-200">
  <div class="flex flex-row gap-2 w-full h-screen p-4">
    @if(auth()->check())
    <div class="menu relative flex flex-col w-96 h-full rounded-xl bg-slate-800">
      <div class="avatar flex items-center gap-2 w-full h-32 px-7 rounded-t-xl">
        <img class="w-14 rounded-full shadow-xl" src="{{asset('storage/img/avatar/luiz.jpeg')}}" alt="avatar">
        <div>
          <h2 class="text-xl font-bold text-white">{{auth()->user()->nome}}</h2>
          <p class="text-sm text-gray-300">{{auth()->user()->login}}</p>
        </div>
      </div>
      
      <div>
        <ul class="pt-5 border-t border-gray-700">
          <li>
            <a href="{{route('dashboard.index')}}" class="flex items-center gap-2 px-7 py-2 text-white hover:bg-slate-700 transition-colors ">
              <i class="fas fa-home"></i>
              <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a href="{{route('movimentacoes.index')}}" class="flex items-center gap-2 px-7 py-2 text-white hover:bg-slate-700 transition-colors ">
            <i class="fa-solid fa-money-bill-transfer"></i>
              <span>Movimentação</span>
            </a>
          </li>

          <li>
            <a href="{{route('funcionarios.index')}}" class="flex items-center gap-2 px-7 py-2 text-white hover:bg-slate-700 transition-colors ">
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
    @endif

    @yield('content')
  </div>
</body>
</html>