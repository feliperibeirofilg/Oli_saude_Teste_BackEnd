<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oli - Saúde</title>

    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark br-dark px-3">
        <div class="collapse navbar-collapse" id="navbar nav">
            <a href="/" title="Inicio">
                <img src="resources/img/oli-saude.png" alt="Oli-Saude">
            </a>
            <a href="/" class="navbar-brand">Inicio</a>
            <a href="/cliente/criarCadastro" class="navbar-brand">Criar Cadastro</a>
            <a href="/cliente/listarClientes" class="navbar-brand">Listar Clientes</a>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>