@extends('layouts.app')

@section('content')

    <div class="navbarr">
        <center>
            <h2>Edit Obat</h2>
        </center>
    </div>

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('medicines.update', $medicine->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Obat</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $medicine->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipe Obat</label>
                <input type="text" name="type" id="type" class="form-control"
                    value="{{ old('type', $medicine->type) }}" required>
            </div>

            <div class="mb-3">
                <label for="unit_id" class="form-label">Satuan</label>
                <select name="unit_id" id="unit_id" class="form-select" required>
                    <option value="" disabled>Pilih Satuan</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}"
                            {{ old('unit_id', $medicine->unit_id) == $unit->id ? 'selected' : '' }}>
                            {{ $unit->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" name="stock" id="stock" class="form-control" min="0"
                    value="{{ old('stock', $medicine->stock) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp)</label>
                <input type="number" name="price" id="price" class="form-control" min="0" step="0.01"
                    value="{{ old('price', $medicine->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="expired_at" class="form-label">Tanggal Kadaluarsa</label>
                <input type="date" name="expired_at" id="expired_at" class="form-control"
                    value="{{ old('expired_at', optional($medicine->expired_at)->format('Y-m-d')) }}">
            </div>

            <button type="submit" class="btn btn-info">Simpan</button>
        </form>
    </div>

@endsection
