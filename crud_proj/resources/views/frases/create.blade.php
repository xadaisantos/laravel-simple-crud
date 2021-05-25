@extends('layout')

@section('cabecalho')
Add Sentence
@endsection

@section('conteudo')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post">
    @csrf
    <div class="form-group">
        <label for="english">English</label>
        <input type="text" class="form-control" name="english" id="english">

        <label for="portuguese">Portuguese</label>
        <input type="text" class="form-control" name="portuguese" id="portuguese">
    </div>
    <button class="btn btn-primary mt-2">Add</button>
    <a href="{{ route('listar') }}" class="btn btn-primary mt-2">Home</a>
</form>
@endsection