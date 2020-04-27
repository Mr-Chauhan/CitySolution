<?php

namespace App\Http\Controllers\Powerpanel;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PowerpanelUsers;
use App\Complain_Category;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
        $user = PowerpanelUsers::findOrFail($id);
        $roles = Role::pluck('varName','id')->all();
        return view('powerpanel.changeprofile.changeprofile',compact('user','roles'));
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
        $user = PowerpanelUsers::findOrFail($id);
        if($request->password = '')
        {
            $input = $request->hidPass;
        }
        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }
        $user->update($input);
        return redirect()->back()->with('success', 'The record edit and save successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
