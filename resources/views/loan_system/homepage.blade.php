@extends('layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <nav class="d-flex justify-content-between align-items-center p-3 border-bottom">
            <span>Welcome, <strong>You Heang</strong></span>
        </nav>
       
    </div>
@endsection
