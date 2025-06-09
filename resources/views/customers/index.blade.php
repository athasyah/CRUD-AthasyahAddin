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
                        <h6>Pelanggan</h6>
                        <a href="#" class="logout"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <a href="{{ route('customers.create') }}" class="btn btn-info">Tambah Data</a>
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center text-sm">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Pelanggan</th>
                                        <th 
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No Telp</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $customer->name }}</td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $customer->phone_number ?? '-' }}
                                            </td>
                                            <td class="text-xs font-weight-bold mb-0">
                                                <a href="{{ route('customers.edit', $customer) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('customers.destroy', $customer) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($customers->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data customer.</td>
                                        </tr>
                                    @endif
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
