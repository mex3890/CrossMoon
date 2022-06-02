<?php

namespace App\Models\Traits\Category;

use App\Models\Assignment;

trait Relationships
{
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
