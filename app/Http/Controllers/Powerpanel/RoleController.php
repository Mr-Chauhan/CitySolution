<?php

namespace App\Http\Controllers\Powerpanel;

use App\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PowerpanelRole = Role::all()->sortByDesc('created_at');
        return view('powerpanel.roles.index', compact('PowerpanelRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Powerpanel.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Role::create($request->all());

        return redirect()->route('role.index')->with('success', 'The record edit and save successfully.');
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
        $roles = Role::findOrfail($id);
        return view('powerpanel.roles.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $PowerpanelRole = Role::findOrFail($id);
        // dd($request->all());

        $PowerpanelRole->update($request->all());

        return redirect()->route('role.index')->with('success', 'The record edit and save successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }


    public function deleteRecord(Request $request)
    {
        $roles = Role::findOrFail($request->checkBoxArray);

        foreach ($roles as $role) {
            $role->delete();
        }
        return redirect()->back()->with('error', 'The record has beed deleted successfully.');
    }
}
