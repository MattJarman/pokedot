<?php

declare(strict_types=1);

namespace App\Models\Ability;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

class Ability extends Model
{
    /** @var string */
    protected $table = 'abilities';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;

    public function prose(): HasOne
    {
        return $this->hasOne(AbilityProse::class)->whereHas('language', static function ($query) {
            $query->where('iso639', App::getLocale());
        });
    }
}
