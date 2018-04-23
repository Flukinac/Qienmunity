<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\gebruikerModel;
use App\Nieuwspost;
use App\Communitypost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $commpost = Communitypost::orderBy('id','desc')->paginate(3);
        $pinnedpost = Nieuwspost::orderBy('id','desc')->where('pinned', 1)->paginate(3);
        $nieuwspost = Nieuwspost::orderBy('id','desc')->where('pinned', 0)->paginate(3);
        return view('home')->with('commpost',$commpost)->with('pinnedpost',$pinnedpost)->with('nieuwspost',$nieuwspost);
    }
}
