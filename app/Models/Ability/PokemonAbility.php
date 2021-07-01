<?php

declare(strict_types=1);

namespace App\Models\Ability;

use Illuminate\Database\Eloquent\Model;

class PokemonAbility extends Model
{
    /** @var string */
    protected $table = 'pokemon_abilities';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;
}
