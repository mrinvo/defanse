<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\clerk;
use App\Models\Detail;
use App\Models\Family;
use App\Models\File;
use App\Models\Jop;
use Illuminate\Http\Request;
use App\Models\Verfication;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Support\Carbon;
use PDF;

class ClerkController extends Controller
{


    public function index(){
        $clerks = Clerk::all()->sortDesc();
        return view('admin.clerks.index',compact('clerks'));
    }

    public function createclerk(){


        $jops = Jop::all();
        return view('admin.clerks.store',compact('jops'));
    }


    public function storeclerk(Request $request){


        $request->validate([
            'name' => 'required|max:250',
            'phone' => 'required|numeric',
            'emirate' => 'required',
            'education' => 'required|max:250',
            'dop' => 'required|date',
            'jop_id' => 'required',

        ]);

        $clerk = Clerk::create([

            'name' => $request->name,
            'phone' => $request->phone,
            'emirate' =>  'Dubai',
            'education' => $request->education,
            'dob' => $request->dop,
            'jop_id' => $request->jop_id,

        ]);


        $vf_code = $this->generateOtp($clerk->phone);

        if($vf_code){
            $vf_msg = 'otp code has been sent to your phone';
        }else{
            $vf_msg = 'no code generated';
        }



        return redirect()->route('admin.clerk.send',$vf_code->otp_code);
    }

    public function send($code){

        return view('admin.clerks.verify',compact('code'));
    }


    public function generateOtp($phone){

        $clerk = Clerk::where('phone',$phone)->first();
        $code = Verfication::where('clerk_id',$clerk->id)->latest()->first();

        $current_time =Carbon::now();

        if(!$clerk){

            return response('we cant find your phone',404);


        }

        if($code && $current_time->isBefore($code->expire_ate)){

            return $code;

        }


        return Verfication::create([
            'clerk_id' => $clerk->id,
            'otp_code' => rand(100000, 999999),
            'expire_at' => Carbon::now()->addMinutes(120),
        ]);
    }

    public function verify(Request $request){

        $request->validate([
            'vf_code' => 'required|exists:verfications,otp_code'
        ]);


        $otp = Verfication::where('otp_code',$request->vf_code)->latest()->first();
        $now = Carbon::now()->addHours(2);



        if($otp){
            $user = Clerk::where('id',$otp->clerk_id)->first();
            $user->verified = 1;
            $user->save();



            return redirect()->route('admin.clerk.edit',$otp->clerk_id);


        }else{
            die(404);
        }


    }

    public function edit($id){

        $clerk = clerk::findOrFail($id);
        $fam = Family::where('clerk_id',$id)->get();
        $files = File::where('clerk_id',$id)->get();
        $jops = Jop::all();

        return view('admin.clerks.update',compact('clerk','fam','files','jops'));

    }

    // public function update(Request $request){

    //     $request->validate([

    //         'name_en' => 'required|max:150',
    //         'name_ar'=> 'required|max:150',
    //         'description_en'=> 'max:500',
    //         'description_ar'=> 'max:500',
    //         'price'=> 'required',
    //         'have_discount'=> 'boolean',
    //         'discounted_price'=> '',
    //         'category_id'=> 'required|exists:categories,id',

    //     ]);

    //     $cat =  Product::findOrFail($request->id);
    //     $isfish = ($request->category_id == 1) ? true : false;



    //     $cat->update([
    //         'name_en' => $request->name_en,
    //         'name_ar'=> $request->name_ar,
    //         'description_en'=> $request->description_en,
    //         'description_ar'=> $request->description_ar,
    //         'price'=> $request->price,
    //         'have_discount'=> $request->have_discount,
    //         'discounted_price'=> $request->discounted_price,
    //         'isfish' => $isfish,
    //         'category_id'=> $request->category_id,


    //     ]);

    //     if($request->file('img')){
    //         $image_path = $request->file('img')->store('api/products','public');
    //         $cat->img = asset('storage/'.$image_path);
    //         $cat->save();
    //     }

    //     return redirect()->route('admin.product.index');


    // }
    public function delete($id){


        $cat = Clerk::findOrFail($id);
        if($cat){
        $det = Detail::where('clerk_id',$id)->first();
        $det->delete();
        $files = File::where('clerk_id',$id)->get();
        foreach($files as $file){


            $file->delete();
        }

        $fams = Family::where('clerk_id',$id)->get();
        foreach($fams as $fam){
            $fam->delete();
        }



        $cat->delete();
    }
        return redirect()->back();



    }

    public function details($id){
        $clerk = Clerk::findOrFail($id);
        $files = File::where('clerk_id',$id)->get();
        $fams = Family::where('clerk_id',$id)->get();
        $details = Detail::where('clerk_id',$id)->first();
        $jops = Jop::all();

        return view('admin.clerks.details',compact('clerk','files','fams','jops','details'));
    }

    public function status(Request $request){

        $clerk = Clerk::findOrFail($request->id);

        $clerk->update([
            'status' => $request->status,
        ]);

        return redirect()->back();

    }

    public function new(){

        $clerks = Clerk::has('detail')->has('files')->has('families')
        ->where('status','new')
        ->where('verified',1)
        ->get()->sortDesc();
        return view('admin.clerks.new',compact('clerks'));

    }

    public function pending(){

        $clerks = Clerk::has('detail')->has('files')->has('families')->where('verified',1)->where('status','pending')->get()->sortDesc();
        return view('admin.clerks.pending',compact('clerks'));

    }

    public function rejected(){

        $clerks =  Clerk::has('detail')->has('files')->has('families')->where('verified',1)->where('status','rejected')->get()->sortDesc();
        return view('admin.clerks.rejected',compact('clerks'));

    }


    public function accepted(){

        $clerks = Clerk::has('detail')->has('files')->has('families')->where('verified',1)->where('status','accepted')->get()->sortDesc();
        return view('admin.clerks.accepted',compact('clerks'));

    }


}
