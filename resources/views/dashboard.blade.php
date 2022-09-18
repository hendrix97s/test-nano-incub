@extends('layouts.app')

@section('content')
  
<div class="w-full h-full bg-white rounded-xl">
  <div class="py-3 px-5 bg-gray-100  rounded-t-xl">Dashboard - Movimentações 2022</div>
  <canvas class="p-10" id="chartLine"></canvas>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart line -->
<script>
  const labels = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
  const data = {
    labels: labels,
    datasets: [
      {
        label: "Entradas",
        backgroundColor: "hsl(208, 100%, 38%)",
        borderColor: "hsl(208, 100%, 38%)",
        data: @json($entradas),
      },
      {
        label: "Saidas",
        backgroundColor: "hsl(18, 100%, 38%)",
        borderColor: "hsl(18, 100%, 38%)",
        data: @json($saidas),
      },
    ],
  };

  const configLineChart = {
    type: "line",
    data,
    options: {},
  };

  var chartLine = new Chart(
    document.getElementById("chartLine"),
    configLineChart
  );
</script>

@endsection