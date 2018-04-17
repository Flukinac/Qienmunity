<?php //

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use App\Profile;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'auth/register';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'rol'=>'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {  
        User::create ([
            'name' => $data['name'],
            'email' => $data['email'],
            'rol'=> $data['rol'],
            'password' => bcrypt($data['password'])
        ]); 
        
        $user = DB::table('users')->where('email', $data['email'])->first();

        Profile::create ([
            'username' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id
        ]);
    }
     
    public function register(Request $request)
{
    $validator = $this->validator($request->all());
 
    if ($validator->fails()) {
        $this->throwValidationException(
            $request, $validator
        );
    }
 
    $this->create($request->all());
 
    return redirect(route('auth.success')); // Change this route to your needs
}

    public function success()
    {
        return view('auth/register');
    }
}
