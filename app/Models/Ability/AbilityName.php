<?php

declare(strict_types=1);

namespace App\Models\Ability;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbilityName extends Model
{
    /** @var string */
    protected $table = 'ability_names';

    /** @var bool */
    public $timestamps = false;

    public function language(): HasMany
    {
        return $this->hasMany(Language::class, 'id', 'local_language_id');
    }
}
