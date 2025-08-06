@extends('layout.app')
@include('partials.alerts')
@section('content')

<h2>Detalhe cadastro cliente</h2>

<table class="table table-striped">
<tr>
    <th>Nome:</th>
    <th>Data de nascimento:</th>
    <th>Doença</th>
    <th>Grau Doença</th>
    <th>Criação Cadastro</th>
    <th>Alteração de Cadastro</th>
</tr>    

    <tbody>
        @foreach($cliente->doencas as $doenca)
            <tr>
                <td>{{ $cliente->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                <td>{{ $doenca->nome_doenca }}</td>
                <td>{{ $doenca->pivot->grau_doenca }}</td>
                <td>{{ \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($cliente->updated_at)->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection