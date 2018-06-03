<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Texts_user;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$text = Texts_user::select(['link','caption','created_at'])->where('user',Auth::user()->name)->get();
		
        return view('home')->with([
									'texts' => $text
									
									]);
    }
}
