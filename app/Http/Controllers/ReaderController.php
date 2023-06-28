<?php

namespace App\Http\Controllers;

use App\Models\reader;
use App\Http\Requests\StorereaderRequest;
use App\Http\Requests\UpdatereaderRequest;
use App\Models\type;
use App\Models\user;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Foundation\Application;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        // dd(reader::all(5));
        // dd(reader::where('id', 19)->get());
        return view('reader.index', [
            'readers' => DB::table('readers')->leftJoin('types', 'readers.type_id', '=', 'types.id')->selectRaw('readers.*, types.name as type')->Paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('reader.create',[
            'types' => type::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorereaderRequest $request
     * @return RedirectResponse
     */
    public function store(StorereaderRequest $request)
    {
        reader::create($request->validated() + [
            'alias' => build_alias($request->name)
        ]);

        return redirect()->route('readers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reader  $reader
     * @return Application|Factory|View|Response|string
     */
    public function show($id)
    {
        $readers = reader::all();
        $type = type::all();
        $users = user::all();

        foreach ($readers as $reader) {
            if ($reader->id == $id) {
                $data = $reader;
                $data['type'] = $this->getType($reader->type_id, $type);
                $data['user'] = $this->getType($reader->user_id, $users);
                return view('reader.detail', [
                    'reader' => $data
                ]);
            }
        }
        return '';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reader  $reader
     * @return Application|Factory|View|Response
     */
    public function edit(reader $reader)
    {
        $data = DB::table('readers')->leftJoin('types', 'readers.type_id', '=', 'types.id')->selectRaw('readers.*, types.name as type')->where('readers.id', $reader->id)->first();
//        dd($data);
        return view('reader.edit', [
            'reader' => $data,
            'types' => type::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereaderRequest  $request
     * @return RedirectResponse|Response
     */
    public function update(UpdatereaderRequest $request, $id)
    {
        $reader = reader::where('id', $id)->first();

        $reader->name = $request->name;
        $reader->address = $request->address;
        $reader->gender = $request->gender;
        $reader->age = $request->age;
        $reader->phone = $request->phone;
        $reader->email = $request->email;
        $reader->type_id = intval($request->type_id);
        $reader->user_id = $request->user_id;
        $reader->register_date = $request->register_date;
        $reader->expired_date = $request->expired_date;
        $reader->save();

        return redirect()->route('readers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reader  $reader
     * @return RedirectResponse|Response
     */
    public function destroy($id)
    {
        reader::find($id)->delete();
        return redirect()->route('readers');
    }

    private function getType($id, $type)
    {
        foreach ($type as $item) {
            if ($item->id == $id) {
                return $item->name;
            }
        }
        return '';
    }
}
