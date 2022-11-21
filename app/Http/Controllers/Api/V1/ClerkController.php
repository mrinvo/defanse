<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\clerk;
use App\Models\Verfication;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClerkController extends Controller
{
    //

    public function storeclerk(Request $request){


        $request->validate([
            'name' => 'required|max:250',
            'phone' => 'required|numeric',
            'emirate' => 'required|in:Dubai,Abu_Dhabi','Sharjah','Ajman','Umm_Al_Quwain','Fujairah','Ras_Al_Khaimah',
            'education' => 'required|max:250',
            'dop' => 'required|date',
            'jop_id' => 'required',

        ]);

        $oldclerk = Clerk::where('phone',$request->phone)->first();

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

            return response();


        }else{
            die(404);
        }


    }
}
