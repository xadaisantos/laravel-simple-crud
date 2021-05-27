@extends('layout')

@section('cabecalho')
    Listagem de Livros
@endsection

@section('conteudo')

    <a href="/livros/adicionar" class="btn btn-primary mb-2">Adicionar</a>
    <a href="/livros/buscar" class="btn btn-primary mb-2">Buscar</a>
    <a href="/livros/listar/lidos" class="btn btn-primary mb-2">Lidos</a>
    <a href="/livros/listar/nao-lidos" class="btn btn-primary mb-2">Nao Lidos</a>
    <button class="btn btn-primary mb-2" onclick="window.print()">Imprimir</button>

    <table class="table">
    <thead>
        <tr>
            <th id="ordenar-por-titulo">Titulo</th>
            <th id="ordenar-por-autor">Autor</th>
            <th id="ordenar-por-paginas">Paginas</th>
            <th id="ordenar-por-lido">Lido</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($livros as $livro)
            <tr>
                <td>{{ $livro["titulo"] }}</td>
                <td>{{ $livro["autor"] }}</td>
                <td>{{ $livro["paginas"] }}</td>
                <td>{{ $livro["lido"] ? "Sim" : "Não" }}</td>
                <td>
                    <a href="/livros/atualizar/{{ $livro->id }}" class="btn btn-secondary btn-sm">Update</a>
                </td>
                <td>
                    <form method="post" action="/livros/destroy/{{ $livro->id }}" onsubmit="return confirm('Deseja remover o livro?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script type="text/javascript" src="{{ asset('/js/index.js') }}"></script>

@endsection