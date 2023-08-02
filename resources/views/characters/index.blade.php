@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center"
            style="margin: 0px;
        color: rgb(32, 35, 41);
        border: none;
        font-weight: 800;
        z-index: 1;
        font-size: 5.625rem;">
            Personajes</h1>

        <!-- Agregar el formulario de búsqueda -->
        <form class="mb-3" action="{{ route('characters.search') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search_query" class="form-control" placeholder="Buscar personajes por nombre">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Agregar el formulario de filtro -->
        <form class="mb-3" action="{{ route('characters.filter') }}" method="GET">
            <div class="input-group">
                <select name="species" class="form-select">
                    <option value="">Todas las especies</option>
                    @foreach ($species_list as $species)
                        <option value="{{ $species }}">{{ $species }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>

        <!-- Mostrar los resultados de la búsqueda y/o filtro -->
        @if (isset($characters_data['results']) && count($characters_data['results']) > 0)
            <div class="row">
                @foreach ($characters_data['results'] as $character)
                    <div class="col-md-4 mb-3">
                        <div class="card text-bg-dark mb-3 mb-3">
                            <a href="{{ route('characters.show', $character['id']) }}">
                                <img src="{{ $character['image'] }}" class="card-img-top" alt="{{ $character['name'] }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="color: inherit;
                                font-family: -apple-system,'BlinkMacSystemFont','Segoe UI','Roboto','Helvetica','Arial',sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
                                font-weight: 800;
                                text-rendering: optimizeLegibility;">
                                    {{ $character['name'] }}</h5>
                                <p class="card-text">
                                    <span class="badge bg-{{ $character['status'] === 'Alive' ? 'success' : 'danger' }}">
                                        {{ $character['status'] }}
                                    </span>
                                    - {{ $character['species'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- SweetAlert para mostrar cuando no hay resultados -->
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'No se encontraron resultados.',
                        confirmButtonColor: '#007bff',
                    });
                });
            </script>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
