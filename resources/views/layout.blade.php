<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @stack('styles')
    <title>homepage</title>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 310px;">
            <a href="../homepage" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Loan Management System</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="../homepage" class="nav-link" aria-current="page">
                        <i class="bi bi-house-door fs-4 me-3"></i>
                        <span class="fs-5">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('loan_list.index') }}" class="nav-link" aria-current="page">
                        <i class="bi bi-bank fs-4 me-3"></i>
                        <span class="fs-5">Loan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payments.index') }}" class="nav-link" aria-current="page">
                        <i class="bi bi-cash fs-4 me-3"></i>
                        <span class="fs-5">Payment</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('borrowers.index') }}" class="nav-link" aria-current="page">
                        <i class="bi bi-people fs-4 me-3"></i>
                        <span class="fs-5">Borrower</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('loan_plan.index') }}" class="nav-link" aria-current="page">
                        <i class="bi bi-bar-chart-line fs-4 me-3"></i>
                        <span class="fs-5">Loan Plans</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('loan_type.index') }}" class="nav-link" aria-current="page">
                        <i class="bi bi-grid-3x3-gap fs-4 me-3"></i>
                        <span class="fs-5">Loan Types</span>
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('image/user.jpg') }}" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Youheang</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">Sign out</button>
                        </form>
                    </li>
                </ul>
              </div>
        </div>

        <!-- Main content -->
        <div class="main-content p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
