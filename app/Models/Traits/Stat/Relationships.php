<?php

namespace App\Models\Traits\Stat;

use App\Models\Assignment;

trait Relationships
{
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
