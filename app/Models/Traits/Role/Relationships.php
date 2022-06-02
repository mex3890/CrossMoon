<?php

namespace App\Models\Traits\Role;

use App\Models\User;

trait Relationships
{
    public function users() {
        return $this->hasMany(User::class);
    }
}
