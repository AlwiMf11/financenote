@extends('layouts.app')

@section('title', 'Daftar Transaksi - FinanceNote')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Daftar Transaksi</h2>
            <p class="text-muted mb-0">Catat keuangan dengan lebih mudah, semua tercatat rapi di sini.</p>
        </div>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Transaksi
        </a>
    </div>

    <div class="card p-3">
        @if ($transactions->isEmpty())
            <div class="empty-state text-center py-5">
                <i class="fa-solid fa-receipt mb-2 d-block"></i>
                <p class="text-muted mb-0">
                    Belum ada transaksi yang tercatat. Yuk mulai catat pemasukan atau pengeluaran pertama Anda.
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
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->date->format('d M Y') }}</td>
                                <td>
                                    {{ $transaction->title }}
                                    @if ($transaction->description)
                                        <br><small class="text-muted">{{ $transaction->description }}</small>
                                    @endif
                                </td>
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
                                <td class="text-center">
                                    <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus transaksi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $transactions->links() }}
            </div>
        @endif
    </div>

@endsection
