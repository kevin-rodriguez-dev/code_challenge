@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mb-3 bg-dark text-light" style="max-width: 30%;">
            <div class="row g-0">
                <img src="{{ $characterData['image'] }}" class="img-fluid rounded-start" alt="{{ $characterData['name'] }}">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $characterData['name'] }}</h5>
                    <p class="card-text">
                        <span class="badge bg-{{ $characterData['status'] === 'Alive' ? 'success' : 'danger' }}">
                            {{ $characterData['status'] }}
                        </span>
                        - {{ $characterData['species'] }}
                    </p>
                    <p class="card-text"><strong>Género:</strong> {{ $characterData['gender'] }}</p>
                    <p class="card-text"><strong>Ubicación:</strong>
                        {{ $characterData['location']['name'] }}</p>
                    <p class="card-text"><strong>Origen:</strong> {{ $characterData['origin']['name'] }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
