@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mb-3 bg-dark text-light" style="max-width: 30%;">
            <div class="row g-0">
                <img src="{{ $character['image'] }}" class="img-fluid rounded-start" alt="{{ $character['name'] }}">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: inherit;
                    font-family: -apple-system,'BlinkMacSystemFont','Segoe UI','Roboto','Helvetica','Arial',sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
                    font-weight: 800;
                    text-rendering: optimizeLegibility;">{{ $character['name'] }}</h5>
                    <p class="card-text">
                        <span class="badge bg-{{ $character['status'] === 'Alive' ? 'success' : 'danger' }}">
                            {{ $character['status'] }}
                        </span>
                        - {{ $character['species'] }}
                    </p>
                    <p class="card-text text-gray" ><strong>Género:</strong> {{ $character['gender'] }}</p>
                    <p class="card-text"><strong>Ubicación:</strong>
                        {{ $character['location']['name'] }}</p>
                    <p class="card-text"><strong>Origen:</strong> {{ $character['origin']['name'] }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
