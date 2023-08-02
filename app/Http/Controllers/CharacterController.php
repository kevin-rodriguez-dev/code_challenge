<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    // Obtener todos los personajes de la API de Rick and Morty
    public function index(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $species = $request->input('species');

        $charactersData = $this->getCharactersFromAPI([
            'name' => $searchQuery,
            'species' => $species
        ]);

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

    public function search(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $species = $request->input('species');

        $charactersData = $this->getCharactersFromAPI([
            'name' => $searchQuery,
            'species' => $species
        ]);

        if (empty($charactersData['results'])) {
            return "sin resultados";
        }
        $characterNames = collect($charactersData['results'])->pluck('name')->toArray();
        
        $speciesList = collect($charactersData['results'])->pluck('species')->unique()->toArray();

        return view('characters.index', compact('charactersData', 'characterNames', 'speciesList'));
    }

    public function filter(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $species = $request->input('species');

        $charactersData = $this->getCharactersFromAPI([
            'name' => $searchQuery,
            'species' => $species
        ]);

        $characterNames = collect($charactersData['results'])->pluck('name')->toArray();
        $speciesList = collect($charactersData['results'])->pluck('species')->unique()->toArray();

        return view('characters.index', compact('charactersData', 'characterNames', 'speciesList'));
    }
}
