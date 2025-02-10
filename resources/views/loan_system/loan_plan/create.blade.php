@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Add Loan Plan</h2>
    <div class="card shadow-sm p-4">
        <form action="{{ route('loan_plan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Loan Plan Name</label>
                <input type="text" class="form-control" name="loanPlanName" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Loan Duration</label>
                <select class="form-control" id="duration" name="duration">
                    <option value="3 Months">3 Months</option>
                    <option value="6 Months">6 Months</option>
                    <option value="1 Year">1 Year</option>
                    <option value="2 Years">2 Years</option>
                </select>
            </div>
            

            <div class="mb-3">
                <label class="form-label">Interest Rate (%)</label>
                <input type="number" step="0.01" class="form-control" name="Interest" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penalty Rate (%)</label>
                <input type="number" step="0.01" class="form-control" name="Penalty" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('loan_plan.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Add Loan Plan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection