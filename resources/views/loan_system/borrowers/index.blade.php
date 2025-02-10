@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Borrowers List</h2>
        <a href="{{ route('borrowers.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Add Borrower
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-3">
        <input type="text" class="form-control" id="search" placeholder="Search borrowers...">
    </div>

    <!-- Borrowers Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Guarantor</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="borrowerTable">
                @foreach($borrowers as $borrower)
                <tr>
                    <td>{{ $borrower->borrowID }}</td>
                    <td>{{ $borrower->borrowName }}</td>
                    <td>{{ $borrower->address }}</td>
                    <td>{{ $borrower->contact }}</td>
                    <td>{{ $borrower->email }}</td>
                    <td>{{ $borrower->tel }}</td>
                    <td>
                        <a href="{{ route('borrowers.edit', $borrower->borrowID) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('borrowers.destroy', $borrower->borrowID) }}" method="POST" class="d-inline">
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
        let rows = document.querySelectorAll('#borrowerTable tr');
        
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? '' : 'none';
        });
    });
</script>
@endsection
