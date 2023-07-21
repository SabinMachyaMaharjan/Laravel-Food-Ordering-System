<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function registration()
    {
        return view('auth.register');
    }
    public function validator(array $data): ValidatorContract
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
            
        
          
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        //return 
        $user=User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
            'is_vendor' => isset($data['is_vendor'])?1:0
        ]);
        $success['token']= $user->createToken($user->username.$user->id)->accessToken; 
        $success['name'] =$user->username;
        Session::put('token', $success['token']); 
        Session::put('user', $success['name']); 
        // return $this->sendResponse($success, 'User register successfully.');
        return $user;
}

public function store(Request $request)
{
    // Validate the form data
    $this->validator($request->all())->validate();

    // Create the user
    $user = $this->create($request->all());

    // Redirect the user after successful registration
    return redirect('/'); // Change '/dashboard' to your desired URL
}
// public function login (Request $request)
// {
//    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
//        $user= Auth::user();
//         $success['token'] =$user->createToken($user->username.$user->id)->accessToken; 
//         $success['name']= $user->username;
//      Session::put('token', $success['token']); 
//      Session::put('user', $success['name']); 
//     //  return redirect('/');
//     return $this->authenticated();
//    }
//  }
 }