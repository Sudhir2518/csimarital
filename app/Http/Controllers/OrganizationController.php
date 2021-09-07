<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;


class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.organizations.index',[
            'organizations' => Organization::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.organizations.create',[
            'organizations' => Organization::all(),
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
            'org_name' => ['required', 'unique:organizations']
        ]);

        $organization = New Organization();
        $organization->org_name = $request->org_name;
        $organization->save();

        return redirect()->route('organizations.index')->with('success', 'new organization field created');
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
    public function edit(Organization $organization)
    {
        return view('dashboard.organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {

        $this->validate($request,[
            'org_name' => ['required','unique:organizations'],
        ]);

         $organization->org_name = $request->org_name;
         $organization->save();

         return redirect()->route('organizations.index')->with('success','Organization name has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()->route('organizations.index')->with("success","organization name deleted ");
    }
}
