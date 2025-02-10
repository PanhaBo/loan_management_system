@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Payments</h2>
        <a href="{{ route('payments.create') }}" class="btn btn-primary">
            <i class="bi bi-plus"></i> Add Payment
        </a>
    </div>

    <div class="mb-3">
        <input type="text" class="form-control" id="search" placeholder="Search loan types...">
    </div>

    <table class="table table-hover table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Borrower Name</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->paymentID }}</td>
                <td>{{ $payment->borrower->borrowName ?? 'Unknown Borrower' }}</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
                <td>{{ $payment->paymentDate }}</td>
                <td>
                    <a href="{{ route('payments.edit', $payment->paymentID) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('payments.destroy', $payment->paymentID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- JavaScript for Search Function -->
<script>
    document.getElementById('search').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#paymentsTable tr');
        
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? '' : 'none';
        });
    });
</script>
@endsection
