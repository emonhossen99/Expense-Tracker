@extends('layouts.app')
@section('content')
<div class="container">
    <h2>All Expenses</h2>
    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Add Expense</a>
    <a href="{{ route('expenses.report') }}" class="btn btn-success mb-3">Report</a>
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Category</th>
        </tr>
        @foreach($expenses as $expense)
        <tr>
            <td>{{ $expense->title }}</td>
            <td>{{ $expense->amount }}</td>
            <td>{{ $expense->date }}</td>
            <td>{{ $expense->category->name }}</td>
        </tr>
        @endforeach
    </table>
    {{ $expenses->links() }}
</div>
@endsection
