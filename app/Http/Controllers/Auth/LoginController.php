<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, HasApiTokens;

    /**
     * Where to redirect users after login.
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
        //$this->redirectTo = session()->get('url.intended');
        $this->middleware('guest')->except('logout');
    }
    public function authenticated()
    {
        $url = session()->get('url.intended');
        //dd($url);
        //strpos(config('app.url'),'8000');
        if(!empty($url) && strpos(config('app.url'), $url) == false){
            return redirect($url);
        } else if (auth()->user()->role->role=='admin') {
            return redirect('/');//->route('admin.dashboard');
        } else if (auth()->user()->role->role=='vendor') {
            return redirect('/')->route('vendor.dashboard');
        } else {
            return redirect('/');
        }
    }
    public function showLoginForm()
    {
        /**
     * 
     *
     * dd(url()->previous());
     */
        
        if(!session()->has('url.intended')) {
            $url = url()->previous();
            session(['url.intended'=>$url]);
        }
        return view('auth.login');
    }
    public function login (Request $request)
{
   if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
       $user= Auth::user();
        $success['token'] =$user->createToken($user->username . $user->id)-> accessToken; 
        $success['name']= $user->username;
     Session::put('token', $success['token']); 
     Session::put('user', $success['name']); 
    //  return redirect('/');
    return $this->authenticated();
   }
   else{
    return redirect("/login")->withErrors(["email"=>"Entered credential is not matched!"]);
}
}
public function logout(){
    auth()->logout();
    return redirect()->route('/login')->with('success','You have been successfully logged out');
}
}