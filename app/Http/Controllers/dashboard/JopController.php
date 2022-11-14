<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\clerk;
use App\Models\Jop;

class JopController extends Controller
{
    //

    public function index(){
        $jops = Jop::all();
        return view('admin.jops.index',compact('jops'));
    }

    public function create(){



        return view('admin.jops.store');
    }


    public function store(Request $request){


        $request->validate([
            'name_ar' => 'required|max:250',
            'name_en' => 'required|max:250'
        ]);





        $jop = jop::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,

        ]);



        return redirect()->route('admin.jop.index');
    }

    public function edit($id){

        $jop = Jop::findOrFail($id);


        return view('admin.jops.update',compact('jop'));

    }

    public function update(Request $request){

        $request->validate([
            'name_ar' => 'required|max:250',
            'name_en' => 'required|max:250'
        ]);

        $jop =  Jop::findOrFail($request->id);



        $jop->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,



        ]);



        return redirect()->route('admin.jop.index');


    }
    public function delete($id){

        $clerk = clerk::where('jop_id',$id)->get();
        if(count($clerk) > 0){
            $message = 'بوجد موظفبن مرتبطبن بهذه الوظبفة';
            return redirect()->route('admin.jop.index')->with($message);
        }
        $cat = Jop::findOrFail($id);

        $cat->delete();
        return redirect()->route('admin.jop.index');



    }
}
