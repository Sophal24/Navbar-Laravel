<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\subscriberModel;
use DB;

class subscriberController extends Controller
{
    //save subscriber when they subscribe the service

    public function savesub(Request $request){
    	$data = new subscriberModel;

    	$data->subscriberId = $request->input('subscriberId');
    	$data->status = $request->input('status');
    	$data->frequency = $request->input('frequency');

    	$data->save();
		// echo "OK";
    }

    // public function savesub(Request $request){
    // 	$data = new subscriberModel;

    // 	// $data->save();
    // 	$subid = $request->input('subscriberId');

    // 	$user_favorites = DB::table('subscribers')
		  //   ->where('subscriberId', '=', $subid)
		  //   ->first();

  		// if (is_null($user_favorites)) {
  		//     // It does not exist - add to favorites button will show
  		//     // echo "no";

  		//     $data->subscriberId = $request->input('subscriberId');
    //   		$data->status = $request->input('status');
    //   		$data->frequency = $request->input('frequency');

    //   		$data->save();
    //   		// echo "Brand new user was Saved";

  		// } else {
  		//     // It exists - remove from favorites button will show
  		//     // echo "yes";
  		//     DB::table('subscribers')
  		//     ->where('subscriberId', '=', $subid)
  		//   	->delete();
  		//     // echo "Done Delete and ";

  		//     $data->subscriberId = $request->input('subscriberId');
    //   		$data->status = $request->input('status');
    //   		$data->frequency = $request->input('frequency');

    //   		$data->save();
    //   		// echo "Saved";

  		// }
    // }



}
