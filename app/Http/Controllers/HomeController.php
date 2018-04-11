<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\gebruikerModel;

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
        return view('home')->with(controller::athenticate());
    }
}
//    $admin = "none";
//        $docent = "none";
//        if(isset(auth()->rol)){
//            switch(auth()->rol){
//                case 0;
//                    $admin = "block";
//                    $docent = "block";
//                    return 
//                break;
//                case 1;
//                    $docent = "block";
//                case 2;
//                break;        
//            }
