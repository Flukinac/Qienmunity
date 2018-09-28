<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Company;
use Validator;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = (object) [
            'name' => '',
            'location' => '',
            'contact_person' => '',
            'email' => '',
            'phone_number' => ''
        ];

        return view('company.create')->with('request', $request);
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
      $company = new Company();
      $company->name = $request->input('name');
      $company->location = $request->input('location');
      $company->contact_person = $request->input('contact_person');
      $company->email = $request->input('email');
      $company->phone_number = $request->input('phone_number');
      $success = $company->save();

      if ($success) {
          return redirect('/home')->with('success', 'Bedrijf aangemaakt');
      } else {
          return view('/company.create')->with('request', $request);
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
      $company = Company::find($id);
      return view('company.show')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit')->with('company',$company);
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
        $company = Company::find($id);

        $company->name = $request->input('name');
        $company->location = $request->input('location');
        $company->contact_person = $request->input('contact_person');
        $company->email = $request->input('email');
        $company->phone_number = $request->input('phone_number');

        $company->save();

        return redirect('admins/{id}');
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
}
