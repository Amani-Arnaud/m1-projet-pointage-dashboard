@extends('layouts.app')
@section('content')
<h2>Tableau de bord</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">Total Agents: {{ $totalAgents }}</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">Présents aujourd'hui: {{ $presentToday }}</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">Taux d'absentéisme: {{ number_format($absentRate, 2) }}%</div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <h2>Statistiques</h2>

<div class="row">
  <!-- 1. Graphique en ligne (Line chart) -->
  <div class="col-md-4">
    <h5>Présences sur 7 jours</h5>
    <canvas id="lineChart"></canvas>
  </div>

  <!-- 2. Graphique en barres (Bar chart) -->
  <div class="col-md-6">
    <h5>Top 5 agents par présence </h5>
    <canvas id="barChart"></canvas>
  </div>

  <!-- 3. Graphique doughnut (camembert) -->
  <div class="col-md-4">
    <h5>Répartition absences justifiées / non justifiées</h5>
    <canvas id="doughnutChart"></canvas>
  </div>
</div>

<div class="row mt-4">
  <!-- 3. Graphique doughnut (camembert) -->
  <!-- <div class="col-md-6">
    <h5>Répartition absences justifiées / non justifiées (Doughnut Chart)</h5>
    <canvas id="doughnutChart"></canvas>
  </div> -->
</div>

<script src="{{ asset('styles/js/chart.js')}}"></script>
<script>
  // 1. Line Chart
  const ctxLine = document.getElementById('lineChart').getContext('2d');
  const lineChart = new Chart(ctxLine, {
    type: 'line',
    data: {
      labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
      datasets: [{
        label: 'Présents',
        data: [12, 19, 14, 17, 15, 13, 18],
        borderColor: 'rgba(54, 162, 235, 1)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        fill: true,
        tension: 0.3
      }]
    },
    options: { responsive: true }
  });

  // 2. Bar Chart
  const ctxBar = document.getElementById('barChart').getContext('2d');
  const barChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
      labels: ['Alice', 'Bob', 'Charlie', 'Diana', 'Ethan'],
      datasets: [{
        label: 'Jours de présence',
        data: [18, 15, 14, 17, 16],
        backgroundColor: 'rgba(255, 99, 132, 0.7)'
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true, stepSize: 1 }
      }
    }
  });

  // 3. Doughnut Chart
  const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
  const doughnutChart = new Chart(ctxDoughnut, {
    type: 'doughnut',
    data: {
      labels: ['Justifiées', 'Non justifiées'],
      datasets: [{
        label: 'Absences',
        data: [8, 5],
        backgroundColor: ['#28a745', '#dc3545']
      }]
    },
    options: { responsive: true }
  });
</script>
</div>
@endsection
