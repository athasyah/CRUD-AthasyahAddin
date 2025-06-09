<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @extends ('layouts.app')

    @section('content')
        @if (session('succes'))
            <div class="alert alert-succes">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="navbarr">
                    <h6>Trip</h6>
                    <a href="#" class="logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <a href="{{ route('sales.create') }}" class="btn btn-info">Tambah Data</a>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center text-sm">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Customer</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Total Harga</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tanggal Penjualan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                                            </div>
                                        </div>
                                        <td class="text-xs font-weight-bold mb-0">{{ $sale->customer->name }}</td>
                                        <td class="text-xs font-weight-bold mb-0">Rp
                                            {{ number_format($sale->total_price, 2, ',', '.') }}</td>
                                        <td class="text-xs font-weight-bold mb-0">
                                            {{ \Carbon\Carbon::parse($sale->sold_at)->format('d M Y H:i') }}</td>
                                        <td class="text-xs font-weight-bold mb-0">
                                            <span class="badge bg-{{ $sale->status == 'selesai' ? 'success' : 'danger' }}">
                                                {{ ucfirst($sale->status) }}
                                            </span>
                                        </td>
                                        <td class="text-xs font-weight-bold mb-0">
                                            <a href="{{ route('sales.edit', $sale) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('sales.destroy', $sale) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
</body>

</html>
