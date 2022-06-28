<?php

namespace App\Models;

use App\Models\Traits\Assignment\Relationships;
use App\Models\Traits\Assignment\Repository;
use App\Models\Traits\Assignment\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Assignment extends Model
{
    use HasFactory, Relationships, Repository, Scopes;

    protected $guarded = ['id'];

    public static function rules(): array
    {
        return [
            'name' => 'required|min:3|max:150',
            'description' => 'required|min:1|max:500',
            'stat_id' => 'required',
            'category_id' => 'required',
            'validity' => "required|date"
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
            'category_id.required' => 'The category is mandatory',
            'validity.required' => 'The date is mandatory',
            'validity.date' => 'The date is invalid'
        ];
    }

    public static function calculatePercentageAssignments(int $user_id): array
    {
        $finished = 0;
        $inProgress = 0;
        $created = 0;
        $validity = 0;
        $total = 0;

        $assignments = Assignment::where('user_id', auth()->user()->id)->with('category', 'stat')->get();
        foreach ($assignments as $assignment){
            $total++;

            if(Assignment::isValidity($assignment)){
                $validity++;
            }

            switch ($assignment->stat->name){
                case 'Finished':
                    $finished++;
                    break;
                case 'In progress':
                    $inProgress++;
                    break;
                case 'Created':
                    $created++;
                    break;
            }
        }

        return [$finished, $inProgress, $created, $validity, $total];
    }

    public static function isValidity(Assignment $assignment): bool
    {
        return $assignment->validity < now() && $assignment->stat->name !== 'Finished';
    }

    public static function calculateCategoriesCount(): \Illuminate\Support\Collection
    {
        return DB::table('assignments')
            ->select('categories.name', DB::raw('count(assignments.category_id) as count'))
            ->join('categories', 'assignments.category_id', '=', 'categories.id')
            ->where('user_id', Auth::user()->id)
            ->groupBy('assignments.category_id')
            ->get();
    }
}
