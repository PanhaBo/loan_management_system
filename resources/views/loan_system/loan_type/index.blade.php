@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Loan Types</h2>
        <a href="{{ route('loan_type.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Loan Type
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-3">
        <input type="text" class="form-control" id="search" placeholder="Search loan types...">
    </div>

    <!-- Loan Types Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="loanTypeTable">
                @foreach($loan_type as $loantype)
                <tr>
                    <td>{{ $loantype->loanTypeID }}</td>
                    <td>{{ $loantype->loanTypeName }}</td>
                    <td>{{ $loantype->Description }}</td>
                    <td>
                        <a href="{{ route('loan_type.edit', $loantype->loanTypeID) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('loan_type.destroy', $loantype->loanTypeID) }}" method="POST" class="d-inline">
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

<!-- JavaScript for Search Function -->
<script>
    document.getElementById('search').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#loanTypeTable tr');
        
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? '' : 'none';
        });
    });
</script>
@endsection
