<?php

namespace App\Http\Controllers;

use App\Models\Edufield;
use Illuminate\Http\Request;

class EdufieldController extends Controller
{
    public $edufields;

    public function index()
    {
        return view('dashboard.edufields.index',[
            'edufields' => Edufield::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.edufields.create',[
            'edufields' => Edufield::all(),
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
        $this->validate($request,['edufield_name' => ['required','unique:edufields']]);

        $edufield                  = new Edufield;
        $edufield->edufield_name   = $request->edufield_name;
        $edufield->save();

        return redirect()->route('edufields.index')->with('success', 'The new Education field is added');
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
    public function edit(Edufield $edufield)
    {
        return view('dashboard.edufields.edit', compact('edufield'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edufield $edufield)
    {
        $this->validate($request, [
            'edufield_name' => ['required','unique:edufields'],
        ]);

        $edufield->edufield_name = $request->edufield_name;
        $edufield->save();

        return redirect()->route('edufields.index')->with('success', 'the education field has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edufield $edufield)
    {
        $edufield->delete();

        return redirect()->route('edufields.index')->with('error', 'Education field deleted');
    }
}
