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
                <td>{{$cliente->sexo}}</td>
                <td>
                    <a href="#editar" class="btn btn-primary btn-sm">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection