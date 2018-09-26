<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Hours_declaration;
use App\Declaration;
use App\Company;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Input;


class TraineeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

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
     * Display the specified User and it's Declarations and Company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *     path="/trainees/{trainees}",
     *     description="Returns trainee showpage.",
     *     operationId="trainees.show",
     *     produces={"application/json"},
     *     tags={"trainees"},
     *     @SWG\Response(
     *         response=200,
     *         description="Trainees showpage."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function show($id)
    {
      $user = User::find($id);

      $hours = Hours_declaration::where('user_id',$id)->get();
      $declarations = Declaration::where('user_id',$id)->get();
      if (isset($user->company_id)) {
        $company = Company::find($user->company_id);
      } else {
        $company = new Company;
        $company->name = 'Geen bedrijf';
      }

      if (Auth::user()->rol == 0) {
          return view('/admin/show_trainee')->with(compact('user','company','hours','declarations'));

      } elseif (Auth::user()->rol >= 1) {
          return view('/trainee/show')->with(compact('user', 'company', 'hours','declarations'));
      }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $company = Company::find($user->company_id);
        $companies = Company::all();
        $select = [];

        if (count($companies) > 0) {
            foreach($companies as $company2) {
                $select[] = $company2->name;
            }
        } else {
            $select[] = "Geen bedrijf";
        }
        return view('admin.edit_trainee')->with(compact('user','company', 'select'));
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
        $new = User::find($id);

        $new->name = $request->input('name');
        $new->last_name = $request->input('last_name');
        $new->email = $request->input('email');
        $new->employee_number = $request->input('employee_number');

        if ($request->input('company') != '') {
          $new->company_id = $request->input('company');
        } else {
          $new->company_id = null;
        }
        $new->rol = $request->input('admin');

        $new->save();

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
