@extends('layouts.app')

@section('title', 'Tambah Transaksi - FinanceNote')

@section('content')

    <div class="mb-4">
        <h2 class="fw-bold">Tambah Transaksi</h2>
        <p class="text-muted mb-0">Catat pemasukan atau pengeluaran Anda agar keuangan lebih rapi.</p>
    </div>

    <div class="card p-4" style="max-width: 700px;">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            @include('transactions._form')

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </div>
        </form>
    </div>

@endsection
