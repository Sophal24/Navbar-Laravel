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


    //function to send sms to users
    // public function sendsms(Request $request){

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //       CURLOPT_URL => "https://api.ideamart.io/sms/send",
    //       CURLOPT_RETURNTRANSFER => true,
    //       CURLOPT_ENCODING => "",
    //       CURLOPT_MAXREDIRS => 10,
    //       CURLOPT_TIMEOUT => 30,
    //       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //       CURLOPT_CUSTOMREQUEST => "POST",
    //       CURLOPT_POSTFIELDS => "{\n    \"message\":\"Hello Everyone!\",\n    \"destinationAddresses\":[\"tel:all\"],\n    \"password\":\"4f57f292e3351ffb49cb4b7b2ec09c71\",\n    \"applicationId\":\"APP_053430\"\n}",
    //       CURLOPT_HTTPHEADER => array(
    //         "Accept: */*",
    //         "Accept-Encoding: gzip, deflate",
    //         "Cache-Control: no-cache",
    //         "Connection: keep-alive",
    //         "Content-Length: 160",
    //         "Content-Type: application/json",
    //         "Host: api.ideamart.io",
    //         "Postman-Token: 7a6ed08e-4841-4154-b1cb-6f1a10a3e0c0,f1700f0f-bb8d-4f45-9a22-6edbf2d325a5",
    //         "User-Agent: PostmanRuntime/7.17.1",
    //         "cache-control: no-cache"
    //       ),
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

    //function to send sms to users
    public function sendsms(Request $request){

        $fixieUrl = getenv("FIXIE_URL");
        
        $parsedFixieUrl = parse_url($fixieUrl);
        // echo $fixieUrl."<br>";
        print_r($parsedFixieUrl);
        echo "<br>";

        $proxy = $parsedFixieUrl['host'].":".$parsedFixieUrl['port'];
        $proxyAuth = $parsedFixieUrl['user'].":".$parsedFixieUrl['pass'];


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.ideamart.io/sms/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n    \"message\":\"Hello Sandaru!\",\n    \"destinationAddresses\":[\"tel:all\"],\n    \"password\":\"4f57f292e3351ffb49cb4b7b2ec09c71\",\n    \"applicationId\":\"APP_053430\"\n}",
          CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Accept-Encoding: gzip, deflate",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Length: 160",
            "Content-Type: application/json",
            "Host: api.ideamart.io",
            "Postman-Token: 53abe4fc-44fe-48dc-be4c-62acd5cbaeca,d4b32d84-2e5d-4114-951e-44a730c17934",
            "User-Agent: PostmanRuntime/7.17.1",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }

    }

    //---------------------------------------------------------
    // function proxyRequest() {
    //     $fixieUrl = getenv("FIXIE_URL");
    //     $parsedFixieUrl = parse_url($fixieUrl);

    //     $proxy = $parsedFixieUrl['host'].":".$parsedFixieUrl['port'];
    //     $proxyAuth = $parsedFixieUrl['user'].":".$parsedFixieUrl['pass'];

    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_PROXY, $proxy);
    //     curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
    //     curl_close($ch);
    // }

    // $response = proxyRequest();
    // print_r($response);
    
}
