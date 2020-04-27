<?php

namespace App\Http\Controllers;
use App\Complains;
use App\PhotoGallery;
use DB;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          
        $count = Complains::count();
        if($count > 10)
        {
            $Complains = Complains::orderBy('created_at', 'desc')->paginate(10);
        }
        else
        {
             $Complains = DB::select("SELECT * FROM complains order by created_at desc limit 10");
        }
        // dd($Complains);

        return view('home',compact('Complains','count'));
    }

    public function post($slug)
    {
        $Complain = Complains::where('slug',$slug)->firstOrFail();

        return view('Show_complain_detail',compact('Complain'));
    }

    public function history()
    {
        return view('history_bvn');
    }
    public function Place_to_see()
    {
        $PhotoGalleries = PhotoGallery::paginate(10);
        return view('Place_to_see',compact('PhotoGalleries'));
    }
}
