<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return view('home');
        if( Auth::user()->hasRole("employer") ) {
            return redirect()->route('employer.dashboard');
        }
        elseif( Auth::user()->hasRole("seeker") ) {
            return redirect()->route('seeker.dashboard');
        }
        
        return redirect()->route('index');
    }
}
