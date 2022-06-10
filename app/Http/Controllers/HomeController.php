<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $percentage = Assignment::calculatePercentageAssignments($user_id);

        $percentageFinished = number_format($percentage[0]/$percentage[3], 2);
        $percentageInProgress = number_format($percentage[1]/$percentage[3], 2);
        $percentageCreated = number_format($percentage[2]/$percentage[3], 2);

        $finished = $percentage[0];
        $inProgress = $percentage[1];
        $created = $percentage[2];
        $total = $percentage[3];

        return view('home', [
            'percentageFinished' => $percentageFinished,
            'percentageInProgress' => $percentageInProgress,
            'percentageCreated' => $percentageCreated,
            'finished' => $finished,
            'inProgress' => $inProgress,
            'created' => $created,
            'total' => $total]);
    }
}
