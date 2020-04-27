<?php

namespace App\Http\Controllers\Powerpanel;

use App\Complains;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complains = Complains::all()->sortByDesc('created_at');
        
        return view("powerpanel.complains.index", compact('complains'));
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ShowComplain = Complains::where('slug',$slug)->firstOrFail();
// dd($ShowComplain);
        return view("powerpanel.complains.show", compact('ShowComplain'));
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
        $id = $request->id;
        $PowerpanelComplains = Complains::findOrFail($id);
      $response =   $PowerpanelComplains->update($request->all());
    if($response == true){
    // $mail = $this->sendToAdmin($id);
    // $mail1 = $this->sendToClient($id);
    return redirect()->route('complains.index')->with('success', 'The record edit and save successfully.');

}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
    }

    public function deleteRecord(Request $request)
    {
        $complains = Complains::findOrFail($request->checkBoxArray);
        foreach ($complains as $complain) {
            $complain->delete();
        }
        return redirect()->back()->with('error', 'The record has beed deleted successfully.');
    }

    public function sendToAdmin($id)
    {
        $complain = Complains::findOrFail($id);

                if($complain->chrStatus == "P")
                {
                    $status = "Pending";
                    $color = "red";
                }
                 else if($complain->chrStatus == "I")
                {
                    $status = "In Progress";
                    $color = "brown";
                }
                else
                {
                    $status = "Complete";
                    $color = "green";
                }

        $data = array(
            'from' => $complain->varEmail,
            'to' => 'sagar966212@gmail.com',
            'name' => "Administrator",
            'complain_name' => $complain->varName,
            'complain_email' => $complain->varEmail,
            'complain_title' => $complain->varPhone,
            'complain_sts' => $status,
            'color'=>$color,
            'complain_dept' => $complain->ComplainCategory->varName,
            'complain_desc' => $complain->varMessage,
            'admin_comments' => $complain->varAdminCmt

        );
        Mail::send('EmailTemplate.complain_resp_admin', $data, function ($message) use ($complain) {
            $message->to('sagar966212@gmail.com')->subject('New Complain by - ' . $complain->varName);
            //   $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
        });
        return "mail sent";
    }
    public function sendToClient($id)
    {
        $complain = Complains::findOrFail($id);
        if($complain->chrStatus == "P")
        {
            $status = "Pending";
            $color = "red";
        }
         else if($complain->chrStatus == "I")
        {
            $status = "In Progress";
            $color = "brown";
        }
        else
        {
            $status = "Complete";
            $color = "green";
        }

        $data = array(
            'from' => 'sagar966212@gmail.com',
            'name' => $complain->varName,
            'complain_title' => $complain->varPhone,
            'complain_sts' => $status,
            'color'=>$color,
            'complain_dept' => $complain->ComplainCategory->varName,
            'complain_desc' => $complain->varMessage,
            'admin_comments' => $complain->varAdminCmt
        );

        $m =   Mail::send('EmailTemplate.complain_resp_client', $data, function ($message) use ($complain) {
            $message->to($complain->varEmail)->subject('Your complain successfully sent');
            //   $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
        });
        return "mail sent";
    }
}
