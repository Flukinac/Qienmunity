<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Profile;
use App\User;

class ProfileController extends Controller
{

    public function index()
    {
        if(auth()->user()->rol == 0){
            $profiles = Profile::orderBy('id','asc')->paginate(20);
        }else{
            $profiles = Profile::orderBy('username','asc')->paginate(20);
        }
        return view('profiles.index')->with('profiles', $profiles);
    }
    
    public function myProfile()
    {
        //
    }


    public function create()
    {
        return view('profiles.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required | min:4',
            'email' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png'
        ],[
            'username.required' => 'Vul het een gebruikersnaam in',
            'username.min' => 'Vul minimaal 4 karakters in',
            'email.required' => 'Vul een emailadres in',
            'image.mimes' => 'Een afbeelding mag alleen van het type jpeg, jpg, bmp of png zijn.'
        ]);

//        ==========-----FOTO UPLOAD================
        
        $file = $request->file('image');
        $filename = auth()->user()->name . '-' . auth()->user()->id . '.jpg';
        $update = false;
        
        if (Storage::disk('local')->has($filename)) {
            $old_file = Storage::disk('local')->get($filename);
            Storage::delete($old_file);
            Storage::disk('local')->put($filename, File::get($file));
            $update = true;
        }
        else if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        
//        ==========-----PROFIEL AANMAKEN================
        
        $profile = new Profile;
        $profile->username = $request->input('username');
        $profile->email = $request->input('email');
        $profile->dateofbirth = $request->input('dateofbirth');
        $profile->position = $request->input('position');
        $profile->biography = $request->input('biography');
        if($request->input('image')){
        $profile->image = $request->input('image');
        }
        $profile->user_id = auth()->user()->id;
        $profile->save();
        
        return redirect('/profiles')->with('success', 'Nieuw profiel succesvol aangemaakt');
                                    
    }
    
    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('profiles.show')->with('profile', $user->profile);
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
        return view('profiles.edit')->with('profile', $user->profile);
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
        $this->validate($request,[
            'email' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png'
        ],[
            'email.required' => 'Vul een emailadres in',
            'image.mimes' => 'Een afbeelding mag alleen van het type jpeg, jpg, bmp of png zijn.'
        ]);

        $profile = Profile::find($id);
        //==========-----FOTO UPDATE------================
        if($request->file('image')){
            $old_name = $profile->username;
            $old_filename = $old_name . '-' . $profile->user_id . '.jpg';
    //        DELETE FILE FROM STORAGE.
            Storage::delete($old_filename);
    //        ADD FILE TO STORAGE
            $file = $request->file('image');
            $filename = $old_name . '-' . $profile->user_id . '.jpg';

            Storage::disk('local')->put($filename, File::get($file));

        }
        //Profiel wijzigen

        $profile->email = $request->input('email');
        $profile->dateofbirth = $request->input('dateofbirth');
        $profile->position = $request->input('position');
        $profile->biography = $request->input('biography');
        if ($request->file('image')) {
            $profile->image = $request->input('image');
        }
        $profile->save();

        return view('/profiles.show')->with('profile', Profile::find($id))->with('success', 'Profiel succesvol gewijzigd');
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
