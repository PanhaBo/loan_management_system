@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Loan Type</h2>

    <!-- Edit Loan Type Form -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('loan_type.update', $loan_type->loanTypeID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-tag"></i> Loan Type Name</label>
                <input type="text" class="form-control" name="loanTypeName" value="{{ $loan_type->loanTypeName }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-card-text"></i> Description</label>
                <textarea class="form-control" name="Description" rows="3" placeholder="Enter loan type description">{{ $loan_type->Description }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('loan_type.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Cancel
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Update Loan Type
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
