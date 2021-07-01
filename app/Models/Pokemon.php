<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Ability\Ability;
use App\Models\Ability\PokemonAbility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Pokemon extends Model
{
    /** @var string */
    protected $table = 'pokemon';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;

    public function abilities(): HasManyThrough
    {
        return $this->hasManyThrough(
            Ability::class,
            PokemonAbility::class,
            'pokemon_id',
            'id',
            '',
            'ability_id'
        );
    }
}
