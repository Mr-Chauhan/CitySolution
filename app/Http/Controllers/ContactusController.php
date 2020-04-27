<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ContactUsLeads;
use Mail;


class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('contactinfo');
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
        $data      = Input::all();

       
        $contactus_lead           = new ContactUsLeads;
        $contactus_lead->varFname  = strip_tags($data['varFname']);
        $contactus_lead->varLname  = strip_tags($data['varLname']);
        $contactus_lead->varEmail  = strip_tags($data['varEmail']);
        $contactus_lead->varPhone  = strip_tags($data['varPhone']);
        if (isset($data['varPhone'])) {
            $contactus_lead->varPhone = strip_tags($data['varPhone']);
        } else {
            $contactus_lead->varPhoneNo = '';
        }
        if (isset($data['varMessage'])) {
            $contactus_lead->varMessage = strip_tags($data['varMessage']);
        } else {
            $contactus_lead->varMessage = '';
        }
        $contactus_lead->save();
        if (!empty($contactus_lead->id)) {

            $recordID = $contactus_lead->id;
            $mail = $this->sendToAdmin($contactus_lead->id);
            return redirect()->route('contactus.thankyou')->with(['form_submit' => true, 'message' => 'Thank you for contacting us, We will get back to you shortly.']);
        } else {
            return redirect('/');
        }
    }

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
    public function destroy(Request $request, $id)
    {
        dd($request->checkBoxArray);
        $photos = ContactUsLeads::findOrFail($request->checkBoxArray);

        foreach ($photos as $photo) {
            $photo->delete();
        }
        return redirect()->back();
    }
    public function sendToAdmin($id)
    {
        $contact = ContactUsLeads::findOrFail($id);
        $data = array('from'=>$contact->varEmail,
                    'to'=>'sagar966212@gmail.com',
                    'name' => "Administrator",'fname'=>$contact->varFname,'lname'=>$contact->varLname,'email'=>$contact->varEmail,'phone'=>$contact->varPhone,'msg'=>$contact->varMessage);

        $m =   Mail::send('EmailTemplate.contactus_admin', $data, function ($message) use ($contact){
            $message->to('sagar966212@gmail.com')->subject('New Contact us request - '.$contact->varFname ." ". $contact->varLname );
            //   $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
        });
        return "mail sent";
    }
}
