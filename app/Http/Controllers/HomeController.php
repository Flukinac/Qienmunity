<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\gebruikerModel;
use App\Nieuwspost;
use App\Communitypost;
use App\Profile;

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
        $commpost = Communitypost::orderBy('id','desc')->paginate(1);
        $pinnedpost = Nieuwspost::orderBy('id','desc')->where('pinned', 1)->paginate(2);
        $nieuwspost = Nieuwspost::orderBy('id','desc')->where('pinned', 0)->paginate(2);
        $profiles = Profile::orderBy('id', 'desc')->paginate(2);
        return view('home')->with('commpost',$commpost)->with('pinnedpost',$pinnedpost)->with('nieuwspost',$nieuwspost)->with('profiles',$profiles);
    }
}
