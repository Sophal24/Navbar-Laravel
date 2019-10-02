<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Weather;

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

    public function user(){
        return view('user');
    }

    public function adminlog(){
        return view('adminlog');
    }

    public function post(){
        return view('post');
    }

    public function weatherhistory(){
        return view('weatherhistory');
    }

    // public function weatherhistory(){
    //     $data = Weather::all();
        
    //     echo "<h2>Weather Data History</h2>";

    //     foreach ($data as $value) {
    //         # code...
    //         echo $value->id."-".$value->date."-".$value->min_tem."-".$value->max_tem."-".$value->day."-".$value->night."-".$value->humidity."-".$value->wind."-".$value->current_tem." "."<br>";
    //     }
    // }

    
}
