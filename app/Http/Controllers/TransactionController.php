<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Tampilkan dashboard dengan ringkasan keuangan.
     */
    public function dashboard()
    {
        $totalIncome = Transaction::income()->sum('amount');
        $totalExpense = Transaction::expense()->sum('amount');
        $balance = $totalIncome - $totalExpense;

        $recentTransactions = Transaction::orderBy('date', 'desc')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalIncome',
            'totalExpense',
            'balance',
            'recentTransactions'
        ));
    }

    /**
     * Tampilkan daftar semua transaksi.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Tampilkan form tambah transaksi.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Simpan transaksi baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $this->validateTransaction($request);

        Transaction::create($validated);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit transaksi.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Perbarui data transaksi di database.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $this->validateTransaction($request);

        $transaction->update($validated);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Hapus transaksi dari database.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }

    /**
     * Validasi input form transaksi.
     */
    private function validateTransaction(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ], [
            'title.required' => 'Judul transaksi wajib diisi.',
            'type.required' => 'Jenis transaksi wajib dipilih.',
            'type.in' => 'Jenis transaksi tidak valid.',
            'amount.required' => 'Jumlah wajib diisi.',
            'amount.numeric' => 'Jumlah harus berupa angka.',
            'amount.min' => 'Jumlah tidak boleh kurang dari 0.',
            'category.required' => 'Kategori wajib diisi.',
            'date.required' => 'Tanggal wajib diisi.',
            'date.date' => 'Format tanggal tidak valid.',
        ]);
    }
}
