<?php

namespace App\Http\Controllers;

use App\Helpers\CharacterHelper;
use Illuminate\Http\Request;

class CharacterController extends Controller
{

    // Mostrar la lista de todos los personajes
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search_query' => 'nullable|string|max:255',
            'species' => 'nullable|string|max:255',
        ]);

        $characters_data = CharacterHelper::getCharactersFromAPI($validated);

        if (empty($characters_data['results'])) {
            return response()->json(['Sin resultados' => 'No se encontraron personajes que coincidan con la búsqueda.']);
        }

        $character_names = collect($characters_data['results'])->pluck('name')->toArray();
        $species_list = collect($characters_data['results'])->pluck('species')->unique()->toArray();

        return view('characters.index', compact('characters_data', 'character_names', 'species_list'));
    }

    // Mostrar los detalles del personaje seleccionado
    public function show($id)
    {
        $character = CharacterHelper::getCharacterDetailsFromAPI($id);
        return view('characters.show', compact('character'));
    }

    // Obtener todos los personajes o filtrar según los parámetros de búsqueda
    public function search(Request $request)
    {
        return $this->index($request);
    }

    // Filtrar los personajes (redirige a la función search)
    public function filter(Request $request)
    {
        return $this->search($request);
    }
}
