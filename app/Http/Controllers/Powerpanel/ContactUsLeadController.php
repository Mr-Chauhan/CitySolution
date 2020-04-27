<?php

namespace App\Http\Controllers\Powerpanel;

use App\ContactUsLeads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactus = ContactUsLeads::all()->sortByDesc('created_at');
        return view("powerpanel.contactus.index", compact('contactus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('powerpanel.contactus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "demo test";
        exit;
        // $photos = ContactUsLeads::findOrFail($request->checkBoxArray);

        // dd($photos);
        // foreach($photos as $photo)
        // {
        //     $photo->delete();
        // }
        // return redirect()->back();
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
        //
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
        //
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
        $contactus = ContactUsLeads::findOrFail($request->checkBoxArray);
        foreach ($contactus as $contact) {
            $contact->delete();
        }
        return redirect()->back()->with('error', 'The record has beed deleted successfully.');
    }
}
