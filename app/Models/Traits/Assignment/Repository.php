<?php

namespace App\Models\Traits\Assignment;

use App\Models\Assignment;
use App\Models\User;

trait Repository
{
    public static function getFiltered(User|int $user, string $filter)
    {
        if($user instanceof User){
            $user = $user->id;
        }

        $filter = match ($filter) {
            'finished' => 1,
            'inProgress' => 2,
            'created' => 3,
        };

        return Assignment::where('user_id', $user)->where('stat_id', $filter)->with('category', 'stat')->get();
    }
}
