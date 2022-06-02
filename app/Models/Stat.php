<?php

namespace App\Models;

use App\Models\Traits\Stat\Relationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory, Relationships;
}
