<?php

namespace App\Models\Traits\Assignment;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait Repository
{
    public static function getCountExpired()
    {
        return Assignment::where([['validity', '<', now()], ['stat_id', '<>', 1], ['user_id', auth()->user()->id]])->get()->count();
    }

    public static function getPercentages(): array
    {
        $user_id = auth()->user()->id;

        $percentage = Assignment::calculatePercentageAssignments($user_id);

        $percentageFinished = number_format($percentage[0]/$percentage[4], 2);
        $percentageInProgress = number_format($percentage[1]/$percentage[4], 2);
        $percentageCreated = number_format($percentage[2]/$percentage[4], 2);
        $percentageExpired = number_format($percentage[3]/$percentage[4], 2);

        $finished = $percentage[0];
        $inProgress = $percentage[1];
        $created = $percentage[2];
        $expired = $percentage[3];
        $total = $percentage[4];

        return [
            'percentageFinished' => $percentageFinished,
            'percentageInProgress' => $percentageInProgress,
            'percentageCreated' => $percentageCreated,
            'percentageExpired' => $percentageExpired,
            'finished' => $finished,
            'inProgress' => $inProgress,
            'created' => $created,
            'expired' => $expired,
            'total' => $total];
    }


}
