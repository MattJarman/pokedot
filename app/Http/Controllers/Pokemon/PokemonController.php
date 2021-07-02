<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PokemonController extends Controller
{
    public function show(Request $request, int $id): Response
    {
        return Inertia::render('Pokemon/Show', [
            'pokemon' => Pokemon::with('abilities.prose')
                ->where('id', $id)
                ->firstOrFail(),
        ]);
    }
}
