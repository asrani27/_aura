@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row text-center">
  <img src="/background/logo.png" width="10%">
  <H2> HI,{{strtoupper(Auth::user()->name)}},SELAMAT DATANG DI APLIKASI DOOR TO DOOR<br /></H2>
</div>
<div class="container">
  <div class="row">
    @foreach ($grouped as $index => $item)
    <div class="col-md-6 mb-4">
      <div id="chartContainer{{ $index }}" style="height: 300px; width: 100%;"></div>
    </div>
    @endforeach
  </div>
</div>

@endsection
@push('js')

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
  window.onload = function() {
    @foreach ($grouped as $index => $item)
    var chart{{ $index }} = new CanvasJS.Chart("chartContainer{{ $index }}", {
        theme: "light2",
        animationEnabled: true,
        title: {
            text: "Data Kecamatan {{ $item['kecamatan'] }}"
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y} data",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y} data",
          dataPoints: [
              { y: {{ $item['terdata'] }}, label: "Sudah Terdata {{ $item['terdata'] }} ({{ $item['terdata_persen'] }}%)" },
              { y: {{ $item['tidak_terdata'] }}, label: "Belum Terdata {{ $item['tidak_terdata'] }} ({{ $item['tidak_terdata_persen'] }}%)" }
          ]
        }]
    });
    chart{{ $index }}.render();
    @endforeach
}
</script>

@endpush