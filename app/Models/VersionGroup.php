<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VersionGroup extends Model
{
    /** @var string */
    protected $table = 'version_groups';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;
}
