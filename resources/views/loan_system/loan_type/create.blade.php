@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Add Loan Type</h2>

    <!-- Loan Type Form -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('loan_type.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-credit-card"></i> Loan Type Name</label>
                <input type="text" class="form-control" name="loanTypeName" required placeholder="Enter loan type name">
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-file-text"></i> Description</label>
                <textarea class="form-control" name="Description" rows="3" placeholder="Enter loan type description"></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('loan_type.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Add Loan Type
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
