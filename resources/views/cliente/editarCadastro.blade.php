@extends('layout.app')
@include('partials.alerts')
@section('content')

     <div class="d-flex justify-content-center align-items-center mb-3" style="min-height: 100vh;">
        <form action="{{route ('attCliente', $cliente->id)}}" method="post" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 500px;">
            @csrf
            <h1>Cadastro Cliente:</h1>
            <div class="mb-3">
                <label for="nome" class="form-label">
                    <input type="text" name="nome" class="form-control border border-dark rounded" value="{{$cliente->nome}}" required>
                </label>
            </div>

            <div class="mb-3">
                <label for="data_nascimento" class="form-label">
                    <input type="date" name="data_nascimento" class="form-control border border-dark rounded" value="{{$cliente->data_nascimento}}" required>
                </label>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select">
                    <option value="1" {{$cliente->sexo ? 'select ed' : '' }}>Masculino</option>
                    <option value="0" {{$cliente->sexo ? 'selected' : '' }}>Feminino</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{route('visualizarClientes')}}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    
@endsection