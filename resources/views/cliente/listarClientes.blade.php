@extends('layout.app')
@section('content')

    <h2>Lista de clientes</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
            </tr>
        </thead>

        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->data_nascimento}}</td>
                <td>
                    @if($cliente->sexo === 1)
                    Masculino
                    @elseif($cliente->sexo === 0)
                    Feminino
                    @endif
                </td>
                <td>
                    <a href="{{ route('editarCliente',['cliente' => $cliente->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection