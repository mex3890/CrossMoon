<?php

namespace App\Models;

use App\Models\Traits\Role\Relationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, Relationships;

    protected $guarded = ['id'];
}
