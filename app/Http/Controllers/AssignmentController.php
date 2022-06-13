<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Models\Category;
use App\Models\Stat;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $filter = $request->get('filter');
        if($filter === null){
            $assignments = Assignment::where('user_id', auth()->user()->id)->with('category', 'stat')->get();
            return view('assignment.index', ['assignments' => $assignments]);
        }

        $assignments = Assignment::getFiltered(auth()->user()->id, $filter);

        return view('assignment.index', ['assignments' => $assignments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $stats = Stat::all();
        $categories = Category::all();
        return view('assignment.create', ['stats' => $stats, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector|Application
     */
    public function store(Request $request): Application|RedirectResponse|Redirector
    {
        if($request->input('_token') != ''){
            $request->validate(Assignment::rules(), Assignment::feedback());
            $assignment = new Assignment([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'user_id' => auth()->user()->id,
                'stat_id' => $request->get('stat_id'),
                'category_id' => $request->get('category_id')
            ]);
            $assignment->save();
            return redirect(route('assignment.index'))->with('Success', 'Assignment added successfully!');
        }

        return redirect(route('assignment.index'))->with('Failed', 'Assignment fail!');
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function show(string $id): Application|Factory|View
    {
        $assignment = Assignment::find($id);
        if(auth()->user()->id === $assignment->user_id){
            $assignment = $assignment->load(['category', 'stat']);
            return view('assignment.show', ['assignment' => $assignment]);
        }
        return view('home', ['msg' => "You've been redirected because don't have access at this assignment"]);
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
     * @return RedirectResponse
     */
    public function destroy(Assignment $assignment): RedirectResponse
    {
        $assignment->delete();
        return redirect()->route('assignment.index');
    }
}
