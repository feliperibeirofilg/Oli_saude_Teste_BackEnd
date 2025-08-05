@extends('layout.app')
@section('content')

    <h2>Lista de clientes</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Data de Nascimento:</th>
                <th>Sexo:</th>
                <th>Ações:</th>
            </tr>
        </thead>

        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->nome}}</td>
                <td>{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                <td>
                    @if($cliente->sexo === 1)
                    Masculino
                    @elseif($cliente->sexo === 0)
                    Feminino
                    @endif
                </td>
                <td>
                    <a href="{{ route('editarCliente',['cliente' => $cliente->id]) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{ route('excluirCliente', ['id'=> $cliente->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link text-danger p-0" onclick="return confirm('Tem certeza que deseja excluir esse cadastro?') title="Excluir">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection