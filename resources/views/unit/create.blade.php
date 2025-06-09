<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Unit</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="navbarr">
        <center>
             <h2>Tambah Unit</h2>
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

            <form action="{{ route('unit.store') }}" method="POST">
                @csrf
                <label for="name" class="form-label">Unit</label><br>
                <div class="my-3">
                    <input type="text" name="name" id="name" class="form-control rounded-3 shadow-sm border-0" value="{{ old('name') }}"
                        >
                </div>
                <button type="submit" class="btn btn-info">Simpan</button>
            </form>
        </div>

    @endsection
</body>

</html>
