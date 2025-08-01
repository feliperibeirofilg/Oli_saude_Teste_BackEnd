@extends('layout.app')
@section('content')

    <div class="d-flex justify-content-center align-items-center mb-3" style="min-height: 100vh;">
            <form action="{{ route('adicionardoenca')}}" method="POST" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 500px;">
                @csrf
                <h1>Cadastro Doença:</h1>
                <div class="mb-3">
                    <label for="nome_doenca" class="form-label">
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

                <button type="submit" class="btn btn-primary">Salvar</button>
                
                <a href="{{route('doencas')}}" class="btn btn-secondary">Cancelar</a>
            </form>
    </div>

@endsection