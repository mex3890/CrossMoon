<?php

namespace App\Models;

use App\Models\Traits\Assignment\Relationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory, Relationships;

    protected $guarded = ['id'];

    public function createFakeAssignment()
    {

    }

    public static function rules(): array
    {
        return [
            'name' => 'required|min:3|max:150',
            'description' => 'required|min:1|max:500',
            'stat_id' => 'required',
            'category_id' => 'required'
        ];
    }

    public static function feedback(): array
    {
        return [
            'required' => 'The :attribute is mandatory',
            'name.min' => 'Minimum 3 characters',
            'name.max' => 'Maximum 150 characters',
            'description.min' => 'Minimum 1 characters',
            'description.max' => 'Maximum 500 characters',
            'stat_id.required' => 'The status is mandatory',
            'category_id.required' => 'The category is mandatory'
        ];
    }
}
