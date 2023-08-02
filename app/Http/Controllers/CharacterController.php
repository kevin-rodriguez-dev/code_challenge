<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    // Obtener todos los personajes de la API de Rick and Morty
    public function index(Request $request)
    {
        $validatedData = $request->validate([
            'search_query' => 'nullable|string|max:255',
            'species' => 'nullable|string|max:255',
        ]);

        $charactersData = $this->getCharactersFromAPI($validatedData);

        $characterNames = collect($charactersData['results'])->pluck('name')->toArray();
        $speciesList = collect($charactersData['results'])->pluck('species')->unique()->toArray();

        return view('characters.index', compact('charactersData', 'characterNames', 'speciesList'));
    }

    // Mostrar los detalles del personaje seleccionado
    public function show($id)
    {
        $characterData = $this->getCharacterDetailsFromAPI($id);
        return view('characters.show', compact('characterData'));
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'search_query' => 'nullable|string|max:255',
            'species' => 'nullable|string|max:255',
        ]);

        $charactersData = $this->getCharactersFromAPI($validatedData);

        if (empty($charactersData['results'])) {
            return response()->json(['Sin resultados' => 'No se encontraron personajes que coincidan con la búsqueda.']);
        }

        $characterNames = collect($charactersData['results'])->pluck('name')->toArray();
        $speciesList = collect($charactersData['results'])->pluck('species')->unique()->toArray();

        return view('characters.index', compact('charactersData', 'characterNames', 'speciesList'));
    }

    public function filter(Request $request)
    {
        return $this->search($request);
    }

    // Obtener personajes desde la API de Rick and Morty
    private function getCharactersFromAPI($params = [])
    {
        $response = Http::get('https://rickandmortyapi.com/api/character', $params);
        return $response->json();
    }

    // Obtener detalles del personaje desde la API de Rick and Morty
    private function getCharacterDetailsFromAPI($id)
    {
        $response = Http::get("https://rickandmortyapi.com/api/character/{$id}");
        return $response->json();
    }
}
