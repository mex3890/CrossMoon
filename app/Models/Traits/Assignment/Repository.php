<?php

namespace App\Models\Traits\Assignment;

use App\Models\Assignment;
use App\Models\User;

trait Repository
{
    public static function getFinished(User|int $user)
    {
        if($user instanceof User){
            $user = $user->id;
        }

        return Assignment::where('user_id', $user)->where('stat_id', 1)->with('category', 'stat')->get();
    }

    public static function getInProgress(User|int $user)
    {
        if($user instanceof User){
            $user = $user->id;
        }

        return Assignment::where('user_id', $user)->where('stat_id', 2)->with('category', 'stat')->get();
    }

    public static function getCreated(User|int $user)
    {
        if($user instanceof User){
            $user = $user->id;
        }

        return Assignment::where('user_id', $user)->where('stat_id', 3)->with('category', 'stat')->get();
    }
}
