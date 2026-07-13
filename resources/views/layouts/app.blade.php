<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FinanceNote')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
            color: #2d3436;
        }
        .navbar-brand {
            font-size: 1.25rem;
        }
        .navbar-brand span {
            color: #198754;
        }
        .card {
            border: none;
            border-radius: 0.9rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: box-shadow 0.2s ease;
        }
        .card-summary {
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .card-summary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        .card-summary h3 {
            font-weight: 700;
        }
        .icon-circle {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        .icon-circle.income { background-color: #d1f4e0; color: #198754; }
        .icon-circle.expense { background-color: #fde2e2; color: #dc3545; }
        .icon-circle.balance { background-color: #dbe9ff; color: #0d6efd; }
        .btn-primary {
            background-color: #198754;
            border-color: #198754;
        }
        .btn-primary:hover {
            background-color: #146c43;
            border-color: #146c43;
        }
        .table > tbody > tr:hover {
            background-color: #f8f9fa;
        }
        .table thead th {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: #6c757d;
            border-bottom-width: 1px;
        }
        .badge {
            font-weight: 500;
            padding: 0.4em 0.7em;
        }
        .form-control:focus,
        .form-select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.15);
        }
        .empty-state i {
            font-size: 2.5rem;
            color: #ced4da;
        }
        footer {
            font-size: 0.85rem;
        }
        @media (max-width: 576px) {
            .navbar .d-flex { flex-wrap: wrap; gap: 0.4rem; }
            .navbar .d-flex a { flex: 1 1 auto; text-align: center; }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-wallet"></i> Finance<span>Note</span>
            </a>
            <div class="d-flex">
                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary me-2">Dashboard</a>
                <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-outline-secondary me-2">Transaksi</a>
                <a href="{{ route('transactions.create') }}" class="btn btn-sm btn-primary">+ Tambah Transaksi</a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center text-muted py-3">
        <small>&copy; {{ date('Y') }} FinanceNote — Kelola uang lebih rapi.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
