<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response($this->user->all(), 200);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return Response
//     */
//    public function create(): Response
//    {
//
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(User::rules(), User::feedback());
        $user = $this->user->create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => $request->password,
           'role_id' => $request->role_id
        ]);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): Application|Factory|View
    {
        $user = User::find($id);
        $user = $user->load('role');

        return view('user.show', ['user' => $user]);
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param int $id
//     * @return Response
//     */
//    public function edit(int $id): Response
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $user = $this->user->find($id);

        if($user === null) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if($request->method() === 'PATCH') {
            $dynamicRules = [];
            foreach($user->rules() as $input => $rule) {

                if(array_key_exists($input, $request->all())) {
                    $dynamicRules[$input] = $rule;
                }
            }
            $request->validate($dynamicRules, $user->feedback());
        }else {

            $request->validate($user->rules(), $user->feedback());
        }

        $user->update($request->all());
        return response()->json(['msg' => 'Update successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $user = $this->user->find($id);
        if($user === null) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['msg' => 'User deleted']);
    }

    public function adminDashboard(): Factory|View|Application
    {
        return view('admin.index');
    }
}
