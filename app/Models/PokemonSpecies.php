<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PokemonSpecies extends Model
{
    /** @var string */
    protected $table = 'pokemon_species';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;

    public function pokemon(): HasMany
    {
        return $this->hasMany(Pokemon::class, 'species_id');
    }

    public function introduced(): HasOne
    {
        return $this->hasOne(Generation::class, 'id', 'generation_id');
    }

    public function forms(): HasMany
    {
        return $this->hasMany(PokemonForm::class);
    }
}
