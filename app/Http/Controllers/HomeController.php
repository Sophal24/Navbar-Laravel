<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Weather;
use App\Models\weatherModel;
use App\Models\subscriberModel;
use App\Models\textareaModel;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function weather(){
        return view('weather');
    }

    // public function user(){
    //     $data = subscriberModel::all();
    //     $count = count($data);
    //     return view('user',compact('data','count'));
    // }

    // public function user(){
    //     $query = subscriberModel::all();
    //     $data = $query->where('status','REGISTERED');
    //     $count = count($data);
    //     return view('user',compact('data','count'));
    // }

    public function user(){

        $query = subscriberModel::all();
        // $data = $query->where('status','REGISTERED')->paginate(2);

        $data = subscriberModel::where('status','REGISTERED')->paginate(5);

        $count = count($data);
        return view('user',compact('data','count'));
    }

    public function unuser(){
        $query = subscriberModel::all();
        $data = $query->where('status','UNREGISTERED');

        $data = subscriberModel::where('status','UNREGISTERED')->paginate(5);
        $count = count($data);
        return view('unuser',compact('data','count'));
    }

    // --------------get admins----------------
    
    public function admins(){
        $data = User::all();
        return view('admins',compact('data'));
        // return view('admins');
        // return "hi";
    }
    // ----------------------------------------

    public function adminlog(){

        $sub = subscriberModel::all();
        $subscriber = $sub->where('status','REGISTERED');
        $unsubscriber = $sub->where('status','UNREGISTERED');
        // $we = weatherModel::all();
        $we = weatherModel::all()->unique("date")->sortByDesc("id");

        $countsub = count($subscriber);
        $countunsub = count($unsubscriber); 
        $countwe  = count($we);


        $lastmessage = textareaModel::all()->sortByDesc("id")->first()->text;
        $lastdate = textareaModel::all()->sortByDesc("id")->first()->created_at;

        return view('adminlog',compact('countsub','countunsub','countwe','lastmessage','lastdate'));
    }

    public function post(){
        return view('post');
    }

    public function weatherhistory(){

        // $data = weatherModel::all()->sortByDesc("id");

        $data = weatherModel::all()->unique("date")->sortByDesc("id");

        // $data = weatherModel::paginate(5);

        // foreach ($data as $value) {
        //     # code...
        //     echo $value->id."-".$value->description."-".$value->max_tem."-".$value->min_tem."-".$value->day_rain."-".$value->night_rain."-".$value->date."<br>";
        // }
        
        $count = count($data);
        return view('weatherhistory', compact('data','count'));
    }


    public function ok(){
        return view('ok');
    }


    public function okweather(){
        return view('okweather');
    }


    //getting data from textarea -> save in database -> and then send to All Users
    public function textarea(){

        $text = new textareaModel;
        $text->text = request('text');
        $text->save();

        // if ($text->save()) {
        //     # code...
        //     echo "Save successfully";
        // }else{
        //     echo "Insert Failed";
        // }

        $data = textareaModel::all()->sortByDesc("id")->first()->text;
        // echo $data;

        //send sms section
        $quotaguard_env = getenv("QUOTAGUARDSTATIC_URL");
        $quotaguard = parse_url($quotaguard_env);

        $proxyUrl       = $quotaguard['host'].":".$quotaguard['port'];
        $proxyAuth       = $quotaguard['user'].":".$quotaguard['pass'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.ideamart.io/sms/send",
          CURLOPT_RETURNTRANSFER => true,

          //
          CURLOPT_PROXY => $proxyUrl,
          CURLOPT_PROXYAUTH => CURLAUTH_BASIC,
          CURLOPT_PROXYUSERPWD => $proxyAuth,
          //

          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n    \"message\":\"$data\",\n    \"destinationAddresses\":[\"tel:all\"],\n    \"password\":\"c227ec9b7b066e1732bf20353fcf19d0\",\n    \"applicationId\":\"APP_053770\"\n}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Postman-Token: 821fc916-caba-4789-ae01-91a2f49da20b",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        //return success or fail status when send sms out
        // if ($err) {
        //   echo "cURL Error #:" . $err;
        // } else {
        //   echo $response;
        // }

        return view('ok');
    }

    //delete user in user tab
    public function delete($id){
        DB::table('subscribers')->where('id',$id)->delete();
        return redirect()->route('unuser');
    }

    public function deleteadmin($id){
        DB::table('users')->where('id',$id)->delete();
        // return redirect()->route('admins');
        return redirect()->route('adminss');
    }

    public function qrcode(){
        return view('qrcode');
    }

    public function saveadmin(){
        $admin = new User;
        $admin->name = request('name');
        $admin->email = request('email');
        $admin->password = Hash::make(request('password'));

        if ($admin->save()) {
            return view('oksaveadmin');
        }else{
            return view('oknotsaveadmin');
        }
    }

    public function addadmin(){
        return view('addadmin');
    }


    public function adminss(){
        return view('admins');
    }

    // public function oknotsaveadmin(){
    //     return view('oknotsaveadmin');
    // }


    
}
