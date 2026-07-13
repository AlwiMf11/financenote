@extends('layouts.app')

@section('title', 'Edit Transaksi - FinanceNote')

@section('content')

    <div class="mb-4">
        <h2 class="fw-bold">Edit Transaksi</h2>
        <p class="text-muted mb-0">Perbarui data transaksi "{{ $transaction->title }}".</p>
    </div>

    <div class="card p-4" style="max-width: 700px;">
        <form action="{{ route('transactions.update', $transaction) }}" method="POST">
            @csrf
            @method('PUT')

            @include('transactions._form')

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Perbarui Transaksi</button>
            </div>
        </form>
    </div>

@endsection
