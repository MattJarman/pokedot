<?php

declare(strict_types=1);

namespace App\Models\Ability;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbilityProse extends Model
{
    /** @var string */
    protected $table = 'ability_prose';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;

    public function language(): HasMany
    {
        return $this->hasMany(Language::class, 'id', 'local_language_id');
    }
}
