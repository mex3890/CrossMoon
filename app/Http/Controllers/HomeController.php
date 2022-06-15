<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
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

        return view('home', [
            'percentageFinished' => $percentageFinished,
            'percentageInProgress' => $percentageInProgress,
            'percentageCreated' => $percentageCreated,
            'percentageExpired' => $percentageExpired,
            'finished' => $finished,
            'inProgress' => $inProgress,
            'created' => $created,
            'expired' => $expired,
            'total' => $total]);
    }
}
