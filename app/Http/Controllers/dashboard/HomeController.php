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

class HomeController extends Controller
{
    //

    public function home(){
        $jops = Jop::all();


        return view('admin.index',compact('jops'));
    }
}
