@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Loan Plans</h2>
        <a href="{{ route('loan_plan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Loan Plan
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-3">
        <input type="text" class="form-control" id="search" placeholder="Search loan plans...">
    </div>

    <!-- Loan Plans Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Duration</th>
                    <th>Interest</th>
                    <th>Penalty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="loanPlanTable">
                @foreach($loan_plans as $loan_plan)
                <tr>
                    <td>{{ $loan_plan->loanPlanID }}</td>
                    <td>{{ $loan_plan->loanPlanName }}</td>
                    <td>{{ $loan_plan->duration }}</td>
                    <td>{{ $loan_plan->Interest }}%</td>
                    <td>{{ $loan_plan->Penalty }}%</td>
                    <td>
                        <a href="{{ route('loan_plan.edit', $loan_plan->loanPlanID) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('loan_plan.destroy', $loan_plan->loanPlanID) }}" method="POST" class="d-inline">
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
</div>

<script>
    document.getElementById('search').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#loanPlanTable tr');
        
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? '' : 'none';
        });
    });
</script>
@endsection
