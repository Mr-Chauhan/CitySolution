<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class ThankyouController extends Controller
{
    public function index(Request $request) 
	{
		if (Session::get('form_submit')) 
		{
				return view('thank-you', ['message' => Session::get('message')]);
		} else {
				return redirect('/');
		}

	}	
}
