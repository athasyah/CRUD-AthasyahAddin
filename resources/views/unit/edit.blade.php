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
             <h2>Edit unit</h2> 
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

    <form action="{{ route('unit.update', $unit->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="my-3">
            <label for="name" class="form-label">Unit</label>
            <input type="text" name="name" id="name" class="form-control rounded-3 shadow-sm border-0" value="{{ old('name',$unit->name) }}" >
        </div>
        <button type="submit" class="btn btn-info">Simpan</button>
    </form>
</div>
@endsection
</body>
</html>

