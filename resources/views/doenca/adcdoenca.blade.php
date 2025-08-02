@extends('layout.app')
@section('content')

    <div class="d-flex justify-content-center align-items-center mb-3" style="min-height: 100vh;">
        

            <form action="{{ route('adicionardoenca', ['cliente' => $cliente->id]) }}" id="doenca-form" method="POST" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 500px;">
                @csrf
                    <h2>Adicionar Doença do paciente: {{ $cliente->nome}}</h2>
                
                <div class="mb-3">
                    <label for="nome_doenca" class="form-label">Nome da Doença:</label>
                        <input type="text" name="nome_doenca" placeholder="Nome da doença:" class="form-control border border-dark rounded">
                    </label>
                </div>

                <div class="mb-3">
                    <label for="grau_doenca" class="form-label">Grau Doença:</label>
                    <select name="grau_doenca" id="grau_doenca" class="form-select">
                        <option value="0">1</option>
                        <option value="1">2</option>
                    </select>
                </div>

                <button type="submit" name="action" value="adicionar" class="btn btn-primary">Adicionar</button>
                <button type="submit" name="action" value="finalizar" class="btn btn-primary">Finalizar Cadastro</button>
                
                <a href="{{route('doencas', ['cliente' => $cliente->id]) }}" class="btn btn-secondary">Cancelar</a>
            </form>

            <div class="d-flex align-items-center mb-3" style="min-height: 100vh;">
                <h4>Doenças já Adicionadas:</h4>
                    <ul>
                        @foreach($cliente->doencas as $doenca)
                            <li>{{ $doenca->nome_doenca }} - Grau: {{ $doenca->pivot->grau_doenca }}</li>
                        @endforeach
                    </ul>
            </div>
    </div>

@endsection