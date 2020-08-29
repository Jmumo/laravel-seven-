<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;



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
    public function index()
    {
        return view('home');
    }
     public function upload(Request $request){
         if($request->hasfile('image')){

         User::image($request->image);
    
       
    
      return redirect()->back()->with('message','image uploaded');
}
    
    // $request->session()->flash('error','image not uploaded');
     return redirect()->back()->with('error','image not uploaded');


    
    }
}
