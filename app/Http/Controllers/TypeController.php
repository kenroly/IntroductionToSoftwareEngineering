<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type;
use App\Http\Requests\StoretypeRequest;
use App\Http\Requests\UpdatetypeRequest;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->department != 'Ban giám đốc'){
            return redirect()->route('dashboard');
        }
        return view('type.index', [
            'types' => type::Paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretypeRequest $request)
    {
        type::create($request->validated());

        return redirect()->route('types');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(type $type)
    {
        return view('type.edit', [
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetypeRequest  $request
     * @param  \App\Models\type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetypeRequest $request, $id)
    {
        $type = type::find($id);
        $type->name = $request->name;
        $type->save();

        return redirect()->route('types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        type::findorfail($id)->delete();
        return redirect()->route('types');
    }
}
