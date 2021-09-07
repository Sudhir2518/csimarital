<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occupation;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.occupations.index',[
            'occupations' => Occupation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.occupations.create',[
            'occupations' => Occupation::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'occu_name' => ['required', 'unique:occupations']
        ]);

        $occupation = New Occupation;
        $occupation->occu_name = $request->occu_name;
        $occupation->save();

        return redirect()->route('occupations.index')->with('success', 'Occupation field created');
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
    public function edit(Occupation $occupation)
    {
        return view('dashboard.occupations.edit', compact('occupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occupation $occupation)
    {

       $this->validate($request,[
           'occu_name' => ['required','unique:occupations']
       ]);

        $occupation->occu_name = $request->occu_name;
        $occupation->save();

        return redirect()->route('occupations.index')->with('success','Education qualification has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupation $occupation)
    {
        $occupation->delete();

        return redirect()->route('occupations.index')->with("success","occupation name deleted");
    }
}
