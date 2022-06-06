<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class AssignmentController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $assignments = Assignment::where('user_id', auth()->user()->id)->with('category', 'stat')->get();
        return view('assignment.index', [
            'assignments' => AssignmentResource::collection($assignments)->toJson()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('assignment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function show(string $id): Application|Factory|View
    {
        $assignment = Assignment::where('id', $id)->get();
        $assignment = $assignment->load(['category', 'stat']);
        return view('assignment.show', ['assignment' => AssignmentResource::collection($assignment)->toJson()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Assignment $assignment
     * @return Response
     */
    public function edit(Assignment $assignment): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Assignment $assignment
     * @return Response
     */
    public function update(Request $request, Assignment $assignment): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Assignment $assignment
     * @return Response
     */
    public function destroy(Assignment $assignment): Response
    {
        //
    }
}
