<?php

namespace App\Models\Traits\Assignment;

use App\Models\Category;
use App\Models\Stat;
use App\Models\User;

trait Relationships
{
    public function stat()
    {
        return $this->belongsTo(Stat::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
