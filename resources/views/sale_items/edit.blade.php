<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="navbarr">
            <center>
                <h2>Edit Expense</h2>
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

            <form action="{{ route('sale_items.update', $sale_item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="my-3">
                    <label for="sale_id" class="form-label">Penjualan</label>
                    <select name="sale_id" id="sale_id" class="form-select rounded-3 shadow-sm border-0">
                        @foreach ($sales as $sale)
                            <option value="{{ $sale->id }}"
                                {{ old('sale_id', $sale_item->sale_id) == $sale->id ? 'selected' : '' }}>
                                {{ $sale->id }} - {{ $sale->sold_at }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label for="medicine_id" class="form-label">Obat</label>
                    <select name="medicine_id" id="medicine_id" class="form-select rounded-3 shadow-sm border-0">
                        @foreach ($medicines as $medicine)
                            <option value="{{ $medicine->id }}"
                                {{ old('medicine_id', $sale_item->medicine_id) == $medicine->id ? 'selected' : '' }}>
                                {{ $medicine->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" name="quantity" id="quantity" class="form-control rounded-3 shadow-sm border-0"
                        min="1" value="{{ old('quantity', $sale_item->quantity) }}">
                </div>

                <button type="submit" class="btn btn-info">Simpan</button>
            </form>

        </div>
    @endsection
</body>

</html>
