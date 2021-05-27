@extends('layout')

@section('cabecalho')
    Buscar Livros
@endsection

@section('conteudo')

    <form method="get" action="/livros/search">
        @csrf
        <div class="form-group">
            <label for="buscar">Digite uma parte do nome do livro, ou do nome do autor.</label>
            <input type="text" class="form-control" name="buscar" id="buscar">
        <button class="btn btn-primary mt-2">Buscar</button>
    </form>

@endsection