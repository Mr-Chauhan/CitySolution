<?php

namespace App\Http\Controllers\Powerpanel;

use App\Role;
use App\PowerpanelUsers;
use Illuminate\Support\Facades\Session;
use App\Complain_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("demo ");
        // return view('powerpanel.users.index');
        // return view('powerpanel.login');

        $users = PowerpanelUsers::all()->sortByDesc('created_at');
        //    dd($users);
        return view("powerpanel.users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('varName', 'id')->all();
        $category = Complain_Category::pluck('varName', 'id')->all();
        // $roles = [1=>'admin'];

        return view('powerpanel.users.create', compact('roles', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->password = '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        // if($file = $request->file('photo_id'))
        // {
        //     $name =  time() . $file->getClientOriginalName();
        //     $file->move('images',$name);
        //     $photo = Photo::create(['file'=>$name]);

        //     $input['photo_id']=$photo->id;

        // }
        // $th =  DB::insert('insert into PowerpanelUserss (fkRoleId, fkCateId,is_active,name, email,created_at,updated_at) values (?,?,?,?,?,?,?)', [$request->fkRoleId,$request->fkCateId,$request->is_active,$request->name,$request->email,$request->password,now(),now()]);
        // dd($input);
        PowerpanelUsers::create($input);
        return redirect()->route('users.index')->with('success', 'The record edit and save successfully.');
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
        $roles = Role::pluck('varName', 'id')->all();
        return view('powerpanel.users.edit', compact('user', 'roles'));
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
        if ($request->password = '') {
            $input = $request->hidPass;
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        // if($file = $request->file('photo_id'))
        // {
        //     $name =  time() . $file->getClientOriginalName();
        //     $file->move('images',$name);
        //     $photo = Photo::create(['file'=>$name]);

        //     $input['photo_id']=$photo->id;

        // }
        $user->update($input);
        return redirect()->route('users.index')->with('success', 'The record edit and save successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PowerpanelUsers::findOrFail($id)->delete();
        // $user = User::findOrFail($id);
        // unlink(public_path() . $user->photo->file);
        // $user->delete();
        Session::flash('deleted_users', 'the user deleted successfully');
        return redirect('/admin/users');
    }

    public function deleteRecord(Request $request)
    {
        $users = PowerpanelUsers::findOrFail($request->checkBoxArray);

        foreach ($users as $user) {
            $user->delete();
        }
        return redirect()->back()->with('error', 'The record has beed deleted successfully.');
    }
}
