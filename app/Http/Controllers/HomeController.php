<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('testRelation');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function testRelation()
    {
        //User::find($id);
        //$user=User::find(1);
        //auth()->user();
        //dd($user->role->role);
        if (auth()->check()) {
            //dd(true);
            dd(auth()->user()->role->role);
        }
        else {
            $user=User::find(1);
            dd($user->role->id);
        }
    }
    //pivot table stays between one
}
