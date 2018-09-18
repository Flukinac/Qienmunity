<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Hours_declaration;
use App\Declaration;
use App\Company;
use Illuminate\Support\Facades\Auth;


class DeclarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        $declarations = Declaration::all();
        $hours = Hours_declaration::all();
        $users = User::all();

        return view('admin.show')->with(compact('users','hours','declarations','companies', 'date'));
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
        $data = $request->json()->all();
        $user = Auth::user();

        $new = new Declaration();

        $new->date_receipt = $data['date_receipt'];
        $new->type = $data['type'];
        $new->total_receipt = $data['total_receipt'];
        $new->btw = $data['btw'];
        $new->description = $data['description'];
        $new->user_id = $user->id;
        $new->status = 0;
        $new->save();

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
//        $user = User::find($id);
//
//        $hours = Hours_declaration::where('user_id',$id)->get();
//        $declarations = Declaration::where('user_id',$id)->get();
//        if(isset($user->company_id)){
//            $company = Company::find($user->company_id);
//        } else {
//            $company = new Company;
//            $company->name = 'Geen bedrijf';
//        }
//
//        if( Auth::user()->role == 1 ){
//
//            return view('admin.show_trainee')->with(compact('user','company','hours','declarations'));
//
//        } elseif ( Auth::user()->role == 0 ) {
//
//            return view('/trainee/show')->with(compact('user','hours','declarations','company'));
//
//        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
     $declaration = Declaration::find($id);
     $data = $request->json()->all();

     $declaration->update($data);
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
    
    public function sendDeclarations($id,$status){

        $declaration = Declaration::find($id);
        
        
            $declaration->status = $status;
            $declaration->save();
        
    }     
    
        
}

