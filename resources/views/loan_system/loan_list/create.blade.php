@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Create Loan</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('loan_list.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Borrower Name</label>
                <select class="form-control" name="borrowID" required>
                    @foreach($borrowers as $borrower)
                        <option value="{{ $borrower->borrowID }}">{{ $borrower->borrowName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Loan Plan</label>
                <select class="form-control" name="loanPlanID" required>
                    @foreach($loanPlans as $loanPlan)
                        <option value="{{ $loanPlan->loanPlanID }}">{{ $loanPlan->loanPlanName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Loan Type</label>
                <select class="form-control" name="loanTypeID" required>
                    @foreach($loanTypes as $loanType)
                        <option value="{{ $loanType->loanTypeID }}">{{ $loanType->loanTypeName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" name="statusID" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->statusID }}">{{ $status->statusName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Payment</label>
                <select class="form-control" name="paymentID" id="paymentID">
                    <option value="">Select Payment</option>
                    @foreach($payments as $payment)
                        <option value="{{ $payment->paymentID }}" data-amount="{{ $payment->amount }}">
                            {{ $payment->paymentID }} - ${{ number_format($payment->amount, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="text" class="form-control" name="amount" id="amount" readonly>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('loan_list.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Add Loan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('paymentID').addEventListener('change', function() {
        let selectedPayment = this.options[this.selectedIndex];
        let amount = selectedPayment.getAttribute('data-amount') || '';
        document.getElementById('amount').value = amount;
    });
</script>

@endsection
