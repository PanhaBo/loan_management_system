@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Payment</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person"></i> Borrower</label>
                <select class="form-control" name="borrowerID" required>
                    @foreach($borrowers as $borrower)
                        <option value="{{ $borrower->borrowID }}">{{ $borrower->borrowName }}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-cash"></i> Amount</label>
                <input type="number" class="form-control" name="amount" required step="0.01" placeholder="Enter amount">
            </div>

            <div class="mb-3">
                <label class="form-label">Payment Date</label>
                <input type="date" class="form-control" name="paymentDate" required>
            </div>
            

            <div class="d-flex justify-content-between">
                <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Add Payment
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
