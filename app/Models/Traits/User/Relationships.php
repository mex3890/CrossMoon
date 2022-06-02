<?php

namespace App\Models\Traits\User;

use App\Models\Role;

trait Relationships
{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
