@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Monthly Report ({{ now()->format('F Y') }})</h2>
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
    <div>
        <canvas id="expenseChart" width="400" height="50"></canvas>
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
        }
    });
</script>
@endsection
