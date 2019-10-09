<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Weather;
use App\Models\weatherModel;
use App\Models\subscriberModel;

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
        $data = $query->where('status','REGISTERED');
        $count = count($data);
        return view('user',compact('data','count'));
    }

    public function unuser(){
        $query = subscriberModel::all();
        $data = $query->where('status','UNREGISTERED');
        $count = count($data);
        return view('unuser',compact('data','count'));
    }

    public function adminlog(){

        $sub = subscriberModel::all();
        $subscriber = $sub->where('status','REGISTERED');
        $unsubscriber = $sub->where('status','UNREGISTERED');
        $we = weatherModel::all();

        $countsub = count($subscriber);
        $countunsub = count($unsubscriber); 
        $countwe  = count($we);
        return view('adminlog',compact('countsub','countunsub','countwe'));
    }

    public function post(){
        return view('post');
    }

    public function weatherhistory(){
        $data = weatherModel::all()->sortByDesc("id");     
        // echo "<h2>Weather Data History</h2>";

        // foreach ($data as $value) {
        //     # code...
        //     echo $value->id."-".$value->description."-".$value->max_tem."-".$value->min_tem."-".$value->day_rain."-".$value->night_rain."-".$value->date."<br>";
        // }
        // $distinct = distinct($data);
        $count = count($data);
        return view('weatherhistory', compact('data','count'));
    }

    public function ok(){
        return view('ok');
    }

    
}
