<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Http\Requests\PokemonShowRequest;
use App\Models\Generation;
use App\Models\PokemonSpecies;
use Inertia\Inertia;
use Inertia\Response;

class PokemonController extends Controller
{
    public function show(PokemonShowRequest $request, int $id): Response
    {
        $pokemon = PokemonSpecies::with([
            'pokemon.abilities.prose',
            'pokemon.abilities.name',
            'introduced',
        ])
            ->where('id', $id)
            ->firstOrFail();

        $generations = Generation::where('id', '>=', $pokemon->introduced->id)->pluck('id')->toArray();

        return Inertia::render('Pokemon/Show', [
            'pokemon' => $pokemon,
            'generation' => $request->has('gen') ? (int) $request->get('gen') : $pokemon->introduced->id,
            'generations' => $generations,
        ]);
    }
}
