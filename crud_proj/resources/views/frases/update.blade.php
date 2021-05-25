@extends('layout')

@section('cabecalho')
Update Sentence
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
    @method('PUT')
    <div class="form-group" action="/frases/update/{{ $frase->id }}">
        <label for="english">English</label>
        <input type="text" class="form-control" name="english" id="english" value="{{ $frase->english }}">

        <label for="portuguese">Portuguese</label>
        <input type="text" class="form-control" name="portuguese" id="portuguese" value="{{ $frase->portuguese }}">
    </div>
    <button class="btn btn-primary mt-2">Update</button>
    <a href="{{ route('listar') }}" class="btn btn-primary mt-2">Home</a>
</form>
@endsection