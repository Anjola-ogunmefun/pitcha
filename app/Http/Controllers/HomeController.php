<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Like;
use App\Models\post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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

       $all_posts= auth()->user()->combinedPosts();
 
       return view('home',['all_posts'=>$all_posts]);
    }
}
