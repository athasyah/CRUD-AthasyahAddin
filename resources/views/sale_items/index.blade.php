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
                <div class="card my-4">
                    <div class="navbarr">
                        <h6>Expense</h6>
                        <a href="#" class="logout"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <a href="{{ route('sale_items.create') }}" class="btn btn-info">Tambah Data</a>
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-sm">No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Penjualan</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Obat</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jumlah</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saleItems as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->sale->id }} - {{ $item->sale->sold_at }}</td>
                                            <td>{{ $item->medicine->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>
                                                <a href="{{ route('sale_items.edit', $item->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('sale_items.destroy', $item->id) }}" method="POST"
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
