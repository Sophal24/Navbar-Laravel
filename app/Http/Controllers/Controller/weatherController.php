<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\weatherModel;
use DB;

class weatherController extends Controller
{
    //save weather data requested from Accuweather API and save in database
    public function saveweather(Request $request){

        $save = new weatherModel;

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://dataservice.accuweather.com/forecasts/v1/daily/1day/49785?apikey=C6XOJOAAX6SYr9xfG1tkTehYPu4HVq1f&language=en-us&details=true&metric=true",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Accept-Encoding: gzip, deflate",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Cookie: forceglacier=true; mforceglacier=true",
            "Host: dataservice.accuweather.com",
            "Postman-Token: def96069-1a50-4f9d-bedb-e3162f0322ed,82554c83-fccd-49d2-9e76-c1d3f7203fdd",
            "User-Agent: PostmanRuntime/7.17.1",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $data = json_decode($response);

        $text = $data->Headline->Text;
        $max = $data->DailyForecasts[0]->Temperature->Maximum->Value;
        $min = $data->DailyForecasts[0]->Temperature->Minimum->Value;
        $day_rain = $data->DailyForecasts[0]->Day->RainProbability;
        $night_rain = $data->DailyForecasts[0]->Night->RainProbability;
        $date = date("D d.m.Y");
      

        $save->description = $text;
        $save->max_tem = $max;
        $save->min_tem = $min;
        $save->day_rain = $day_rain;
        $save->night_rain = $night_rain;
        $save->date = $date;
        
        if ($save->save()) {
          # code...
          echo "Weather Row added successfully."."<br>";

        }else{
          echo "Insert Error";
        }
        // $save->save();
        // echo "Weather Row added successfully."."<br>"; 
    }




    //function to send sms to users via FIXIE 
    // public function sendsms(Request $request){


    //     $fixieUrl = getenv("FIXIE_URL");
    //     $parsedFixieUrl = parse_url($fixieUrl);

    //     $proxy = $parsedFixieUrl['host'].":".$parsedFixieUrl['port'];
    //     $proxyAuth = $parsedFixieUrl['user'].":".$parsedFixieUrl['pass'];


    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //       CURLOPT_URL => "https://api.ideamart.io/sms/send",
    //       CURLOPT_RETURNTRANSFER => true,
    //       CURLOPT_ENCODING => "",
    //       CURLOPT_MAXREDIRS => 10,
    //       CURLOPT_TIMEOUT => 30,
    //       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //       CURLOPT_CUSTOMREQUEST => "POST",
    //       CURLOPT_POSTFIELDS => "{\n    \"message\":\"Good Morning!\",\n    \"destinationAddresses\":[\"tel:all\"],\n    \"password\":\"4f57f292e3351ffb49cb4b7b2ec09c71\",\n    \"applicationId\":\"APP_053430\"\n}",
    //       CURLOPT_HTTPHEADER => array(
    //         "Accept: */*",
    //         "Accept-Encoding: gzip, deflate",
    //         "Cache-Control: no-cache",
    //         "Connection: keep-alive",
    //         "Content-Length: 158",
    //         "Content-Type: application/json",
    //         "Host: api.ideamart.io",
    //         "Postman-Token: acc850dd-7c44-407e-a4ab-5aa032975512,b8b439fe-9e5c-48b7-b426-9a55c8a3e5ee",
    //         "User-Agent: PostmanRuntime/7.17.1",
    //         "cache-control: no-cache"
    //       ),
    //         curl_setopt($curl, CURLOPT_PROXY, $proxy),
    //         curl_setopt($curl, CURLOPT_PROXYUSERPWD, $proxyAuth),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //       echo "cURL Error #:" . $err;
    //     } else {
    //       echo $response;
    //     }

    // }

    //function to send sms to users via QuotaQuard
    public function sendsms(Request $request){
        $quotaguard_env = getenv("QUOTAGUARDSTATIC_URL");
          $quotaguard = parse_url($quotaguard_env);

          $proxyUrl       = $quotaguard['host'].":".$quotaguard['port'];
          $proxyAuth       = $quotaguard['user'].":".$quotaguard['pass'];

          $url = "http://ip.quotaguard.com/";

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_PROXY, $proxyUrl);
          curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_BASIC);
          curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
          $response = curl_exec($ch);
          // return $response;
          echo $response;
    }
    
}
