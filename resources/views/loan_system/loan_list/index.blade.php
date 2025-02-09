@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Loan List</h2>

    <a href="{{ route('loan_list.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus"></i> Add New Loan
    </a>

    <table class="table table-hover table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Borrower Name</th>
                <th>Loan Plan</th>
                <th>Loan Type</th>
                <th>Payment</th>
                <th>Duration (Months)</th>
                <th>Interest (%)</th>
                <th>Penalty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loanLists as $loan)
            <tr>
                <td>{{ $loan->loanListID }}</td>
                <td>{{ $loan->borrower->borrowName ?? 'N/A' }}</td>
                <td>{{ $loan->loanPlan->loanPlanName ?? 'N/A' }}</td>
                <td>{{ $loan->loanType->loanTypeName ?? 'N/A' }}</td>
                <td>{{ optional($loan->payment)->amount ? '$' . number_format($loan->payment->amount, 2) : 'N/A' }}</td>
                <td>{{ $loan->loanPlan->duration ?? 'N/A' }}</td>
                <td>{{ $loan->loanPlan->Interest ? $loan->loanPlan->Interest . '%' : 'N/A' }}</td>
                <td>${{ number_format($loan->loanPlan->Penalty ?? 0, 2) }}</td>
                <td>
                    @if($loan->status->statusName == 'Pending')
                        <span class="badge bg-warning text-dark">{{ $loan->status->statusName }}</span>
                    @elseif($loan->status->statusName == 'Approved')
                        <span class="badge bg-success">{{ $loan->status->statusName }}</span>
                    @elseif($loan->status->statusName == 'Finished')
                        <span class="badge bg-primary">{{ $loan->status->statusName }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $loan->status->statusName ?? 'N/A' }}</span>
                    @endif
                </td>                
                <td>
                    <a href="{{ route('loan_list.edit', $loan->loanListID) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('loan_list.destroy', $loan->loanListID) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection
