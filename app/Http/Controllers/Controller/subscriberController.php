<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\subscriberModel;
use DB;

class subscriberController extends Controller
{
    // save subscriber when they subscribe the service

    // public function savesub(Request $request){
    // 	$data = new subscriberModel;

    // 	$data->subscriberId = $request->input('subscriberId');
    // 	$data->status = $request->input('status');
    // 	$data->frequency = $request->input('frequency');

    // 	$data->save();
		  // echo "OK";
    // }

    public function savesub(Request $request){

    	$data = new subscriberModel;

      // echo $request->input('frequency');
      // echo $request->input('status');
      // echo $request->input('subscriberId');

      $subid = $request->input('subscriberId');
      echo $subid; 
      
    	// $subid = $request->input('subscriberId');

    	$user_favorites = DB::table('subscribers')
		    ->where('subscriberId', '=', $subid)
		    ->first();

  		if (is_null($user_favorites)) {
  		    // It does not exist - add new user to the database
  		    // echo "no";

          $data->frequency = $request->input('frequency');
          $data->status = $request->input('status');
  		    $data->subscriberId = $request->input('subscriberId');

      		$data->save();

      		// echo "Brand new user was Saved successfully.";

  		} else {
  		    // It exists - remove old ones and save the new one.
  		    // echo "yes";

  		    DB::table('subscribers')
  		    ->where('subscriberId', '=', $subid)
  		  	->delete();
  		    // echo "Done Delete old row and ";

  		    $data->frequency = $request->input('frequency');
          $data->status = $request->input('status');
          $data->subscriberId = $request->input('subscriberId');

      		$data->save();

      		// echo "Saved successfully.";

  		}
    }



}
