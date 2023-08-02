<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class CharacterHelper
{
    const RICK_AND_MORTY_API_URL = 'https://rickandmortyapi.com/api';

    // Obtener todos los personajes de la API de Rick and Morty
    public static function getCharactersFromAPI(array $params)
    {
        $response = Http::get(self::RICK_AND_MORTY_API_URL . '/character', $params);

        if (!$response->successful()) {
            return "Sin resultados";
        }

        return $response->json();
    }

    // Obtener detalles del personaje desde la API de Rick and Morty
    public static function getCharacterDetailsFromAPI(int $id)
    {
        $response = Http::get(self::RICK_AND_MORTY_API_URL . "/character/{$id}");

        if (!$response->successful()) {
            return "Sin resultados";
        }

        return $response->json();
    }
}
