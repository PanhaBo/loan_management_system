@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Add Payment</h2>

    <!-- Payment Form -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
        
            <div class="mb-3">
                <label class="form-label">Borrower</label>
                <select class="form-control" name="borrowerID" required>
                    @foreach($borrowers as $borrower)
                        <option value="{{ $borrower->borrowID }}">{{ $borrower->borrowName }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount" required min="0.01" step="0.01">
            </div>
        
            <div class="mb-3">
                <label class="form-label">Payment Date</label>
                <input type="date" class="form-control" name="paymentDate" required>
            </div>
        
            <button type="submit" class="btn btn-success">Add Payment</button>
        </form>
        
    </div>
</div>
@endsection