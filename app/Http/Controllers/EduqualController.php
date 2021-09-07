<?php

namespace App\Http\Controllers;

use App\Models\Eduqual;
use Illuminate\Http\Request;
use CreateEduqualsTable;

class EduqualController extends Controller
{
    public function index()
    {
        return view('dashboard.eduquals.index',[
            'eduquals' => Eduqual::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.eduquals.create',[
           'eduquals' => Eduqual::all(),
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
            'eduqual_name' => ['required', 'unique:eduquals']
        ]);

        $eduqual = New Eduqual;
        $eduqual->eduqual_name = $request->eduqual_name;
        $eduqual->save();

        return redirect()->route('eduquals.index')->with('success', 'new education field created');
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
    public function edit(Eduqual $eduqual)
    {
       return view('dashboard.eduquals.edit', compact('eduqual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eduqual $eduqual)
    {
        $this->validate($request,[
            'eduqual_name' => ['required','unique:eduquals'],

        ]);

        $eduqual->eduqual_name = $request->eduqual_name;
        $eduqual->save();

        return redirect()->route('eduquals.index')->with('success','Education qualification has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eduqual $eduqual)
    {
        $eduqual->delete();

        return redirect()->route('eduquals.index')->with('error', 'the education qualification is deleted');
    }
}
