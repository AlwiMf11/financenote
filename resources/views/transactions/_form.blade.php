<div class="mb-3">
    <label for="title" class="form-label">Judul Transaksi</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $transaction->title ?? '') }}" placeholder="Contoh: Gaji Bulanan, Makan Siang">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="type" class="form-label">Jenis Transaksi</label>
        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
            <option value="">-- Pilih Jenis --</option>
            <option value="income" {{ old('type', $transaction->type ?? '') === 'income' ? 'selected' : '' }}>Pemasukan</option>
            <option value="expense" {{ old('type', $transaction->type ?? '') === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
        </select>
        @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="category" class="form-label">Kategori</label>
        <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror"
               value="{{ old('category', $transaction->category ?? '') }}"
               placeholder="Contoh: Gaji, Makanan, Transportasi" list="categoryList">
        <datalist id="categoryList">
            <option value="Gaji">
            <option value="Bonus">
            <option value="Freelance">
            <option value="Makanan">
            <option value="Transportasi">
            <option value="Belanja">
            <option value="Tagihan">
        </datalist>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="amount" class="form-label">Jumlah (Rp)</label>
        <input type="number" step="0.01" min="0" name="amount" id="amount"
               class="form-control @error('amount') is-invalid @enderror"
               value="{{ old('amount', $transaction->amount ?? '') }}" placeholder="0">
        @error('amount')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="date" class="form-label">Tanggal</label>
        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
               value="{{ old('date', isset($transaction) ? $transaction->date->format('Y-m-d') : date('Y-m-d')) }}">
        @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Catatan (opsional)</label>
    <textarea name="description" id="description" rows="3"
              class="form-control @error('description') is-invalid @enderror"
              placeholder="Tambahkan catatan tambahan jika perlu">{{ old('description', $transaction->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
