@extends('layout')

@section('cabecalho')
    Adicionar Livros
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

    <form method="post" action="/livros/store">
    @csrf
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo" id="titulo">

        <label for="autor">Autor</label>
        <input type="text" class="form-control" name="autor" id="autor">

        <label for="paginas">Paginas</label>
        <input type="number" class="form-control" name="paginas" id="paginas">

        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="lido" id="lido">
            <label class="form-check-label" for="lido">
                Lido
            </label>
        </div>
    </div>
    <button class="btn btn-primary mt-2">Concluir</button>
</form>

@endsection