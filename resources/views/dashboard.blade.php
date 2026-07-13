@extends('layouts.app')

@section('title', 'Dashboard - FinanceNote')

@section('content')

    <div class="mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted">Pantau pemasukan dan pengeluaran harian Anda dengan lebih mudah.</p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card card-summary p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Pemasukan</p>
                        <h3 class="text-success mb-0">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h3>
                    </div>
                    <div class="icon-circle income">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-summary p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Pengeluaran</p>
                        <h3 class="text-danger mb-0">Rp {{ number_format($totalExpense, 0, ',', '.') }}</h3>
                    </div>
                    <div class="icon-circle expense">
                        <i class="fa-solid fa-arrow-trend-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-summary p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Sisa Saldo</p>
                        <h3 class="mb-0 {{ $balance >= 0 ? 'text-primary' : 'text-danger' }}">
                            Rp {{ number_format($balance, 0, ',', '.') }}
                        </h3>
                    </div>
                    <div class="icon-circle balance">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Transaksi Terbaru</h5>
            <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
        </div>

        @if ($recentTransactions->isEmpty())
            <div class="empty-state text-center py-4">
                <i class="fa-solid fa-file-invoice-dollar mb-2 d-block"></i>
                <p class="text-muted mb-0">
                    Belum ada transaksi. Mulai kebiasaan finansial yang lebih baik dengan menambahkan transaksi pertama Anda.
                </p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th class="text-end">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction->date->format('d M Y') }}</td>
                                <td>{{ $transaction->title }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $transaction->category }}</span></td>
                                <td>
                                    @if ($transaction->type === 'income')
                                        <span class="badge bg-success">Pemasukan</span>
                                    @else
                                        <span class="badge bg-danger">Pengeluaran</span>
                                    @endif
                                </td>
                                <td class="text-end fw-semibold {{ $transaction->type === 'income' ? 'text-success' : 'text-danger' }}">
                                    {{ $transaction->type === 'income' ? '+' : '-' }} Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
