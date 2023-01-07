<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'users' => user::Paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreuserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreuserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt('password');
        $data['alias'] = build_alias($data['name']);
        user::create($data);

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return string
     */
    public function show($id)
    {
        $users = user::all();
        foreach ($users as $user) {
            if ($user->id == $id) {
                return view('user.detail', ['user' => $user]);
            }
        }
        return '';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = user::all();
        foreach ($users as $user) {
            if ($user->id == $id) {
                return view('user.edit', ['user' => $user]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateuserRequest  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(UpdateuserRequest $request, $id)
    {
        $user = user::find($id)->first();
        $user->update($request->validated());
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        $user = user::find($id)->first();
        $user->delete();
        return redirect()->route('users');
    }
}
