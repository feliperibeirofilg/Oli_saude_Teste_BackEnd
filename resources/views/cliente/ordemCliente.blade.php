@extends('layout.app')
@section('content')

<h2>Clientes Ordenados por score</h2>

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Score</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientesOrdenados as $cliente)
        <tr>
            <td>{{ $cliente->nome}}</td>
            <td>{{ $cliente->score}}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection