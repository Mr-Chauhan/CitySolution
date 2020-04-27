<?php

namespace App\Http\Controllers\Powerpanel;

use App\PhotoGallery;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PhotoGalleries = PhotoGallery::all()->sortByDesc('created_at');
        return view('powerpanel.photogallery.index', compact('PhotoGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Powerpanel.photogallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $name = "";
        if ($file = $request->file('varImage')) {
            $name =  time() . $file->getClientOriginalName();
            $file->move('images/PhotoGallery', $name);
        }
        $PhotoGalleries = new PhotoGallery;
        $PhotoGalleries->varTitle  = strip_tags($data['varTitle']);
        $PhotoGalleries->varImage = $name;

        if (isset($data['varMessage'])) {
            $PhotoGalleries->varMessage = strip_tags($data['varMessage']);
        } else {
            $PhotoGalleries->varMessage = '';
        }
        $PhotoGalleries->save();
        /*Start this code for message*/
        $headers = '';
        if (!empty($PhotoGalleries->id)) {
            $recordID = $PhotoGalleries->id;
            return redirect()->route('photogallery.index')->with('success', 'The record edit and save successfully.');
        } else {
            return redirect('/');
        }
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
        $roles = PhotoGallery::findOrfail($id);
        return view('powerpanel.photogallery.edit', compact('roles'));
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
        $PowerpanelRole = PhotoGallery::findOrFail($id);
        if ($file = $request->file('varImage')) {
            $name =  time() . $file->getClientOriginalName();
            $file->move('images/PhotoGallery', $name);
            $PowerpanelRole['varImage'] = $name;
        }

        $PowerpanelRole->update($request->all());

        return redirect()->route('photogallery.index')->with('success', 'The record edit and save successfully.');
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


    public function deleteRecord(Request $request)
    {
        $PhotoGalleries = PhotoGallery::findOrFail($request->checkBoxArray);

        foreach ($PhotoGalleries as $PhotoGallery) {
            unlink(public_path() . "/images/PhotoGallery/" . $PhotoGallery->varImage);
            $PhotoGallery->delete();
        }
        return redirect()->back()->with('error', 'The record has beed deleted successfully.');
    }
}