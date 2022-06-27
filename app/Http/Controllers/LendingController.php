<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lending;
use Illuminate\Support\Facades\DB;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('lendings')
                ->select(
                    'id',
                    'name',
                    'optgroup_id'
                )
                ->orderBy(
                    'id',
                    'desc'
                )
                ->paginate(10);


        return view('lending.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Lending $lending)
    {
        $lending = new Lending;

        $lending->name = $request->input('name');
        $lending->optgroup_id = $request->input('optgroup_id');

        $lending->save();

        return redirect('lending/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Lending::find($id);

        return view('lending.edit',compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $items = Lending::find($id);

        $items->name = $request->input('name');
        $items->optgroup_id = $request->input('optgroup_id');

        $items->save();

        return redirect('lending/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Lending::find($id);
        $items->delete();

        return redirect('lending/index');
    }
}
