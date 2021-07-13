<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    /** @var string */
    protected $table = 'generations';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;
}
