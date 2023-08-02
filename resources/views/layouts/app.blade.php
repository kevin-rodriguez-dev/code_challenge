<!DOCTYPE html>
<html>

<head>
    <title>The Rick and Morty API</title>
    <!-- Enlaces a los estilos de Bootstrap a través del CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importar la fuente Roboto desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>
        /* Estilo personalizado para la navbar */
        .navbar {
            background: #C0C0C0;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar-nav .nav-item .nav-link {
            color: rgb(32, 35, 41);
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #808080;
        }

        .navbar-nav {
            margin-left: auto;
        }
    </style>
</head>

<body
    style="background: #808080; font-variant-ligatures: none; text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; text-decoration-skip-ink: auto;">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">

            <!-- Botón para colapsar la navbar en dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Elementos de la navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Enlace a la página principal de personajes -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('characters.index') }}"><strong>PERSONAJES</strong></a>
                    </li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
