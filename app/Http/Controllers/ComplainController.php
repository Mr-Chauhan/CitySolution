<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Complains;
use Mail;
use App\Complain_Category;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com_cat = Complain_Category::pluck('varName', 'id')->all();
        return view('complain', compact('com_cat'));
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
        $name = "";
        $data = $request->all();
        if ($file = $request->file('file')) {
            $name =  time() . $file->getClientOriginalName();
            $file->move('images/complains', $name);
        }
        $complains_lead = new Complains;
        $complains_lead->varName  = strip_tags($data['varName']);
        $complains_lead->varTitle  = strip_tags($data['varTitle']);
        $complains_lead->varEmail  = strip_tags($data['varEmail']);
        $complains_lead->varPhone  = "";
        $complains_lead->fkCateId  = strip_tags($data['fkCateId']);
        $complains_lead->varImage = $name;

        if (isset($data['varMessage'])) {
            $complains_lead->varMessage = strip_tags($data['varMessage']);
        } else {
            $complains_lead->varMessage = '';
        }
        $complains_lead->save();
        /*Start this code for message*/
        $headers = '';
        if (!empty($complains_lead->id)) {
            $mail = $this->sendToAdmin($complains_lead->id);
            $mail1 = $this->sendToClient($complains_lead->id);
            return redirect()->route('complain.thankyou')->with(['form_submit' => true, 'message' => 'Thank you for contacting us, We will get back to you shortly.']);
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

    public function sendToAdmin($id)
    {
        $complain = Complains::findOrFail($id);
        $data = array(
            'from' => $complain->varEmail,
            'to' => 'sagar966212@gmail.com',
            'name' => "Administrator",
            'complain_name' => $complain->varName,
            'complain_email' => $complain->varEmail,
            'complain_title' => $complain->varPhone,
            'complain_dept' => $complain->ComplainCategory->varName,
            'complain_desc' => $complain->varMessage
        );

        $m =   Mail::send('EmailTemplate.complain_admin', $data, function ($message) use ($complain) {
            $message->to('sagar966212@gmail.com')->subject('New Complain by - ' . $complain->varName);
            //   $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
        });
        return "mail sent";
    }
    public function sendToClient($id)
    {
        $complain = Complains::findOrFail($id);
        $data = array(
            'from' => 'sagar966212@gmail.com',
            'name' => "Administrator",
            'complain_name' => $complain->varName,
            'complain_email' => $complain->varEmail,
            'complain_title' => $complain->varPhone,
            'complain_dept' => $complain->ComplainCategory->varName,
            'complain_desc' => $complain->varMessage
        );

        $m =   Mail::send('EmailTemplate.complain_client', $data, function ($message) use ($complain) {
            $message->to($complain->varEmail)->subject('Your complain successfully sent');
            //   $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
        });
        return "mail sent";
    }
}
