@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Loan</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('loan_list.update', $loan_list->loanListID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Borrower Name</label>
                <select class="form-control" name="borrowID" required>
                    @foreach($borrowers as $borrower)
                        <option value="{{ $borrower->borrowID }}" {{ $loan_list->borrowID == $borrower->borrowID ? 'selected' : '' }}>
                            {{ $borrower->borrowName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Loan Plan</label>
                <select class="form-control" name="loanPlanID" required>
                    @foreach($loanPlans as $loanPlan)
                        <option value="{{ $loanPlan->loanPlanID }}" {{ $loan_list->loanPlanID == $loanPlan->loanPlanID ? 'selected' : '' }}>
                            {{ $loanPlan->loanPlanName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Loan Type</label>
                <select class="form-control" name="loanTypeID" required>
                    @foreach($loanTypes as $loanType)
                        <option value="{{ $loanType->loanTypeID }}" {{ $loan_list->loanTypeID == $loanType->loanTypeID ? 'selected' : '' }}>
                            {{ $loanType->loanTypeName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" name="statusID" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->statusID }}" {{ $loan_list->statusID == $status->statusID ? 'selected' : '' }}>
                            {{ $status->statusName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('loan_list.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Update Loan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
