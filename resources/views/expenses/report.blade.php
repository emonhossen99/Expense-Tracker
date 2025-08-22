@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2>Monthly Report ({{ now()->format('F Y') }})</h2>
        <a class="btn btn-warning" href="{{ route('expenses.index') }}">Back</a>
    </div>
    <table class="table table-bordered">
        @foreach($grouped as $category => $amount)
        <tr>
            <td>{{ $category }}</td>
            <td>{{ $amount }}</td>
        </tr>
        @endforeach
        <tr>
            <th>Total</th>
            <th>{{ $total }}</th>
        </tr>
    </table>

        <!-- Chart -->
    <div style="max-width: 300px; margin: auto;">
        <canvas id="expenseChart" width="300" height="300"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('expenseChart');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: {!! json_encode($grouped->keys()) !!},
        datasets: [{
            data: {!! json_encode($grouped->values()) !!},
            backgroundColor: ['#FF6384','#36A2EB','#FFCE56','#4BC0C0'],
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 15,
                    padding: 10
                }
            }
        }
    }
});
</script>
@endsection
