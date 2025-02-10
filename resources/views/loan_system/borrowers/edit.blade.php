@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Borrower</h2>

    <!-- Borrower Edit Form -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('borrowers.update', $borrower->borrowID) }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person"></i> Borrower Name</label>
                <input type="text" class="form-control" name="borrowName" value="{{ $borrower->borrowName }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-geo-alt"></i> Address</label>
                <input type="text" class="form-control" name="address" value="{{ $borrower->address }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-telephone"></i> Contact</label>
                <input type="text" class="form-control" name="contact" value="{{ $borrower->contact }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <input type="email" class="form-control" name="email" value="{{ $borrower->email }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-phone"></i> Tel</label>
                <input type="text" class="form-control" name="tel" value="{{ $borrower->tel }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('borrowers.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Cancel
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Update Borrower
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
