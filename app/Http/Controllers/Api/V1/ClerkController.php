<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\clerk;
use App\Models\Verfication;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Family;
use App\Models\File;
use Illuminate\Http\Request;

class ClerkController extends Controller
{
    //

    public function storeclerk(Request $request){


        $request->validate([
            'name' => 'required|max:250',
            'phone' => 'required|numeric',
            'emirate' => 'required|in:1,2,3,4,5,6,7',
            'education' => 'required|max:250',
            'dop' => 'required|date',
            'jop_id' => 'required',

        ]);

        $oldclerk = Clerk::where('phone',$request->phone)->where('verified')->first();

        if($oldclerk ){

        }

        $clerk = Clerk::create([

            'name' => $request->name,
            'phone' => $request->phone,
            'emirate' =>  $request->emirate,
            'education' => $request->education,
            'dob' => $request->dop,
            'jop_id' => $request->jop_id,

        ]);


        $vf_code = $this->generateOtp($clerk->phone);

        // if($vf_code){
        //     $vf_msg = 'otp code has been sent to your phone';
        // }else{
        //     $vf_msg = 'no code generated';
        // }


        $response = [
            'message' =>  trans('api.fetch'),
            'data' => $clerk,
            'otp code' => $vf_code->otp_code,

        ];

        return response($response,201);


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


            $response = [
                'message' =>  trans('api.emailverified'),
                'data' => $user,


            ];

            return response($response,201);


        }else{
            die(404);
        }


    }

    public function details(Request $request,$id){

        $request->validate([
            'summury' => 'required',
            'name' => 'required|max:250',
            'emirate' => 'required|in:1,2,3,4,5,6,7',
            'education' => 'required|max:250',
            'dop' => 'required|date',
            'jop_id' => 'required',
            'mil_no' => 'required',
            'mil_batch_no' => 'required',
            'id_no' => 'required',

            'id_export_no' => 'required',
            'id_expire_no' => 'required',
            'pass_no'=> 'required',
            'pass_export_no' => 'required',
            'pass_expire_no' => 'required',


        ]);

        $clerk = clerk::findOrFail($id);

        if($clerk->verified == 0){
            return response('you are not verified');

        }

        $clerk->update([
            'summury' => $request->summury,
            'name' => $request->name,
            'emirate' => $request->emirate,
            'education' => $request->education,
            'dop' => $request->dop,
            'jop_id' => $request->jop_id,

        ]);

        $d = Detail::create([

            'mil_no' => $request->mil_no,
            'mil_batch_no' => $request->mil_batch_no,
            'id_no' => $request->id_no,
            'id_export_no' => $request->id_export_no,
            'id_expire_no' => $request->id_expire_no,
            'pass_no' => $request->pass_no,
            'pass_export_no' => $request->pass_export_no,
            'pass_expire_no' => $request->pass_expire_no,
            'notes' => $request->notes,
            'clerk_id' => $id,

        ]);



        foreach($request->family as $fam){

            Family::create([
                'clerk_id' => $id,
                'relation_type' => $fam['relation_type'],
                'name' => $fam['name'],
                'work' => $fam['work'],
                'nationality' => $fam['nationality'],
            ]);
        }

        return response(trans('api.stored'),201);
    }

    public function file(Request $request,$id){
        $request->validate([
            'file' => 'required|file',
            'type' => 'required|in:id,pass,education,service,qualifier',
            'clerk_id' => $id,

        ]);

        $file_path = $request->file('file')->store('api/clerks','public');

       $file =  File::create([
            'file' =>  asset('storage/'.$file_path),
            'type' => $request->type,
            'clerk_id' => $id,
        ]);

        if($file){
            return response(trans('api.stored'),201);
        }else{
            return response(trans('api.notfound'));
        }

    }


}
