<?php

namespace App\Models\Traits\Assignment;

use Illuminate\Database\Eloquent\Builder;

trait Scopes
{
    public function scopeCurrentUser(Builder $query): void
    {
        $query->where('user_id', auth()->user()->id);
    }

    public function scopeValidity(Builder $query): void
    {
        $query->where('validity', '<', now());
    }

    public function scopeUnfinished(Builder $query): void
    {
        $query->where('stat_id', '<>', 1);
    }
}
