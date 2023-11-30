@extends('layouts.app')

@section('title', 'Bienvenid@')

@section('contents')




<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
    <div class="dropdown no-arrow">
      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <div class="dropdown-header">Dropdown Header:</div>
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
  </div>
  <!-- Card Body -->
  <?php
  $inventarios = App\Models\Inventory::all();
  $labels = $inventarios->pluck('name')->toArray();
  $data = $inventarios->pluck('amount')->toArray();

  ?>
  <div class="card-body">
    <div class="chart-area">
      <div class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand">
          <div class=""></div>
        </div>
        <div class="chartjs-size-monitor-shrink">
          <div class=""></div>
        </div>
      </div>
      <canvas id="myAreaChart" style="display: block; width: 638px; height: 320px;" width="638" height="320" class="chartjs-render-monitor"></canvas>
      <script>
        var labels = {!! json_encode($labels) !!};
  var data = {!! json_encode($data) !!};
      </script>
    </div>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
  </div>
  <div class="card-body">
    <div class="chart-bar">
      <canvas id="myBarChart"></canvas>
    </div>
    <hr>
    Styling for the bar chart can be found in the
    <code>/js/demo/chart-bar-demo.js</code> file.
  </div>
</div>


<!-- Donut Chart -->

<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
  </div>
  <!-- Card Body -->
  <div class="card-body">
    <div class="chart-pie pt-4">
      <canvas id="myPieChart"></canvas>
    </div>
    <hr>
    Styling for the donut chart can be found in the
    <code>/js/demo/chart-pie-demo.js</code> file.
  </div>
</div>



<!-- Page level plugins -->

@endsection