<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <div class="navbarr">
            <center>
                <h2>Edit Data Penjualan</h2>
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

            <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menggunakan method PUT untuk update -->

                <div class="my-3">
                    <label for="customer_id" class="form-label">Pilih Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select rounded-3 shadow-sm border-0">
                        <option value="" disabled>Pilih Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ old('customer_id', $sale->customer_id) == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label for="total_price" class="form-label">Total Harga</label>
                    <input type="number" name="total_price" id="total_price"
                        class="form-control rounded-3 shadow-sm border-0"
                        value="{{ old('total_price', $sale->total_price) }}" min="0">
                </div>

                <div class="my-3">
                    <label for="sold_at" class="form-label">Tanggal Penjualan</label>
                    <input type="datetime-local" name="sold_at" id="sold_at"
                        class="form-control rounded-3 shadow-sm border-0"
                        value="{{ old('sold_at', \Carbon\Carbon::parse($sale->sold_at)->format('Y-m-d\TH:i')) }}">
                </div>

                <div class="my-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select rounded-3 shadow-sm border-0">
                        <option value="selesai" {{ old('status', $sale->status) == 'selesai' ? 'selected' : '' }}>Selesai
                        </option>
                        <option value="batal" {{ old('status', $sale->status) == 'batal' ? 'selected' : '' }}>Batal
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-info">Simpan</button>
            </form>
        </div>
        <script>
            // Mengambil tanggal hari ini dalam format YYYY-MM-DD
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("start_date").setAttribute('min', today);
        </script>
    @endsection
    </div>

</body>

</html>
