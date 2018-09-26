<?php

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\User;
use App\Profile;
    use App\Hours_declaration;
    use App\Declaration;
    use App\Company;
    use App\Client;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Auth;

Route::auth();
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    //Standaard views routes
    
    Route::get('/community', function () {
        return view('community');
    });

    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('/nieuws', function () {
        return view('nieuws');
    });

//    Route::get('/resource', function () {
//        return view('index');
//    });

    Route::get('/nieuwegebruiker', function () {
        return view('auth/register');
    });
    
//    Route::get('/myprofile',[
//    'uses'=>'ProfileController@myProfile'] );

    //custom routes

        Route::get('/formulier', function(){
            $user = Auth::user();
            $id = $user->id;
            $hours = Hours_declaration::where('user_id',$id)->get();
            $declarations = Declaration::where('user_id',$id)->get();

            if(isset($user->company_id)){
                $company = Company::where('id',$user->company_id)->get();
            } else {
                $company = new Company;
                $company->name = 'Geen bedrijf';
            }

            return view('trainee/formulier')->with(compact('user','hours','declarations','company'));
        });

        Route::get('/admin/trainee/{id}', 'UserController@show');

        Route::get('/bulkdeclarations/{id}/{status}', 'DeclarationController@sendDeclarations');

        Route::get('/bulkhourdeclarations/{id}/{status}', 'Hours_declarationController@sendDeclarations');

        Route::get('/storage/{filename}', function ($filename)
        {
            $file = Storage::disk('local')->get($filename);

            return new Response($file,200);
        });

    //Resource routes
    
    Route::resource('nieuwsposts','NieuwsController');

    Route::resource('profiles', 'ProfileController');

    Route::resource('post','PostIdController');

    Route::resource('communitypost','CommunityController');
    
    Route::resource('resource','ResourceController');


        Route::resource('/trainees', 'TraineeController');

        Route::resource('/admins', 'AdminController');

        Route::resource('/declarations','DeclarationController');

        Route::resource('/hours_declarations', 'Hours_declarationController');

        Route::resource('/companies', 'CompanyController');

        Route::resource('/trainees.declarations', 'TraineeDeclarationController');

        Route::resource('/trainees.hours_declarations', 'TraineeHours_declarationController');


    //Methode routes
    
    Route::put('/videoupdate', 'HomeController@updatevideo');
    
    Route::get('/profileimage/{filename}', ['uses' => 'ProfileController@getUserImage', 'as' => 'profile.image']);

    Route::post('/zoek', 'NieuwsController@search');
    
    Route::post('/zoekComm', 'CommunityController@searchComm');
    
    Route::get('/munityimage/{filename}', ['uses' => 'CommunityController@getUserImage', 'as' => 'community.image']);
    
    Route::get('/newsimage/{filename}', ['uses' => 'NieuwsController@getUserImage', 'as' => 'news.image']);
    
    Route::post('/contactMail', 'ContactController@sendContact');

    Route::get('/home','HomeController@index');
   
    Route::post('bookmark/{post_id}', ['uses' => 'NieuwsController@bookmark', 'as' => 'nieuws.bookmark']);
    
    Route::get('testauth', 'testController@auth');  

    Route::get('/auth/success', ['uses' => 'Auth\AuthController@success', 'as'   => 'auth.success']);
                
    Route::get('/unsign/{mail}', 'Auth\AuthController@notify' );  
    
    Route::get('/RemoveUser/{profile}', 'Auth\AuthController@remove');

    Route::post('nieuwscomment/{post_id}', ['uses' => 'NieuwsCommentController@store', 'as' => 'nieuwscomment.store']);




    //Comments plaatsen en deleten op Nieuws en Communitypagina vanuit namespace CommentControllers
    
    Route::group(['namespace'=>'CommentControllers', 'prefix'=>'CommentControllers'], function(){
        
        Route::post('nieuwscomment/{post_id}', ['uses' => 'NieuwsCommentController@store', 'as' => 'nieuwscomment.store']);

        Route::delete('nieuwscommentdelete/{comment_id}', ['uses' => 'NieuwsCommentController@destroy', 'as' => 'nieuwscomment.destroy']);

        Route::post('communitycomment/{post_id}', ['uses' => 'CommunityCommentController@store', 'as' => 'communitycomment.store']);

        Route::delete('communitycommentdelete/{comment_id}', ['uses' => 'CommunityCommentController@destroy', 'as' => 'communitycomment.destroy']);

    });   
   
});