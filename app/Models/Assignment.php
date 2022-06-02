<?php

namespace App\Models;

use App\Models\Traits\Assignment\Relationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory, Relationships;
}
