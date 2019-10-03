<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\subscriberModel;

class subscriberController extends Controller
{
    //
    public function savesub(Request $request){
    	$data = new subscriberModel;

    	$data->subscriberId = $request->input('subscriberId');
    	$data->status = $request->input('status');
    	$data->frequency = $request->input('frequency');

    	$data->save();
		// echo "OK";
    }
}
