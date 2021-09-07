<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreDesignationRequest;
use CreateDesignationsTable;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public $designations;

    public function index()
    {
        if(Auth::user()->isAdmin){
            return view('dashboard.designations.index', [
                'designations' => Designation::all(),
            ]);
        }else{
            return redirect()->route('dashboard')->with("error","You are not authorized to operate that route");
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin){
            return view('dashboard.designations.create');
        }else{
            return redirect()->route('dashboard')->with("error","You are not authorized to operate that route");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'desgn_name' => ['required','max:255'],
        ]);
        $designation = New Designation;
        $designation->desgn_name = $request->desgn_name;
        $designation->save();

        return redirect()->route('designations.index')->with('success', 'New Designation successfully added');
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
    public function edit(Designation $designation)
    {
        return view('dashboard.designations.edit', compact('designation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
        $this->validate($request, [
            'desgn_name'          => ['required', 'unique:designations'],
            ]);

        $designation->desgn_name = $request->desgn_name;
        $designation->save();

        return redirect()->route('designations.index')->with('success', 'Cdesignationsuccesfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();

        return redirect()->route('designations.index')->with('error', 'Category deleted');
    }
}
