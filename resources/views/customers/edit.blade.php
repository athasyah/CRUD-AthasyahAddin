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
             <h2>Edit Pelanggan</h2> 
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

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="my-3">
            <label for="name" class="form-label">Pelanggan</label>
            <input type="text" name="name" id="name" class="form-control rounded-3 shadow-sm border-0" value="{{ old('name',$customer->name) }}" >
        </div>
        <div class="my-3">
            <label for="name" class="form-label">No Telp</label>
            <input type="text" name="phone_number" id="name" class="form-control rounded-3 shadow-sm border-0" value="{{ old('phone_number',$customer->phone_number) }}" >
        </div>
        <button type="submit" class="btn btn-info">Simpan</button>
    </form>
</div>
@endsection
</body>
</html>

