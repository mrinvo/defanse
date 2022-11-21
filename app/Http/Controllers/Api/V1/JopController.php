<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\Jop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JopController extends Controller
{
    //
    public function index(){
        $jops = Jop::select([
            'id',
            'name_'.app()->getLocale() .' as name',

        ])->get();

        $response = [
            'message' =>  trans('api.fetch'),
            'data' => $jops,

        ];

        return response($response,201);


    }


}
