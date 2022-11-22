<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cleaning;
use App\Models\Jop;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\clerk;

class HomeController extends Controller
{
    //

    public function home(){
        $jops = Jop::all();

        $new = Clerk::has('detail')->has('files')->has('families')
        ->where('status','new')
        ->where('verified',1)
        ->get();

        $pending = Clerk::where('status','pending')->get();

        $rejected = Clerk::where('status','rejected')->get();

        $accepted = Clerk::where('status','accepted')->get();



        return view('admin.index',compact('jops','new','pending','rejected','accepted'));
    }
}
