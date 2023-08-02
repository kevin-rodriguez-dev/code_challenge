<!DOCTYPE html>
<html>

<head>
    <title>Tu título</title>
    <!-- Enlaces a los estilos de Bootstrap a través del CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo o título del sitio -->
            <a class="navbar-brand" href="{{ route('home') }}">Tu Sitio</a>

            <!-- Botón para colapsar la navbar en dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Elementos de la navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Enlace a la página principal de personajes -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('characters.index') }}">Personajes</a>
                    </li>
                    <!-- Otros enlaces de la navbar -->
                    <!-- Agrega más enlaces aquí si es necesario -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Contenido de la página -->
        @yield('content')
    </div>

    <!-- Agregar los scripts de Bootstrap y jQuery desde el CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
