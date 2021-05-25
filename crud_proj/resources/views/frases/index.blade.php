@extends('layout')

@section('cabecalho')
English Sentences to Study!
@endsection

@section('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>English</th>
            <th>Portuguese</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($frases as $frase)
            <tr>
                <td>{{ $frase["english"] }}</td>
                <td>{{ $frase["portuguese"] }}</td>
                <td>
                    <form method="post" action="/frases/remover/{{ $frase->id }}" onsubmit="return confirm('Are you sure you want to remove it?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/frases/criar" class="btn btn-dark mb-2">Add</a>
@endsection