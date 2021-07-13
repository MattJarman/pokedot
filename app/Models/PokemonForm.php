<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PokemonForm extends Model
{
    /** @var string */
    protected $table = 'pokemon_forms';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;
}
