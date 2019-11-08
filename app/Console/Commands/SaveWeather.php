<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\weatherModel;
use DB;

class SaveWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request Weather from Accuweather API and Save in Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        //
        // $save = new weatherModel;

        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "http://dataservice.accuweather.com/forecasts/v1/daily/1day/49785?apikey=C6XOJOAAX6SYr9xfG1tkTehYPu4HVq1f&language=en-us&details=true&metric=true",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "GET",
        //   CURLOPT_HTTPHEADER => array(
        //     "Accept: */*",
        //     "Accept-Encoding: gzip, deflate",
        //     "Cache-Control: no-cache",
        //     "Connection: keep-alive",
        //     "Cookie: forceglacier=true; mforceglacier=true",
        //     "Host: dataservice.accuweather.com",
        //     "Postman-Token: def96069-1a50-4f9d-bedb-e3162f0322ed,82554c83-fccd-49d2-9e76-c1d3f7203fdd",
        //     "User-Agent: PostmanRuntime/7.17.1",
        //     "cache-control: no-cache"
        //   ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);
        // $data = json_decode($response);

        // $text = $data->Headline->Text;
        // $max = $data->DailyForecasts[0]->Temperature->Maximum->Value;
        // $min = $data->DailyForecasts[0]->Temperature->Minimum->Value;
        // $day_rain = $data->DailyForecasts[0]->Day->RainProbability;
        // $night_rain = $data->DailyForecasts[0]->Night->RainProbability;
        // $date = date("D d.m.Y");

        // $save->description = $text;
        // $save->max_tem = $max;
        // $save->min_tem = $min;
        // $save->day_rain = $day_rain;
        // $save->night_rain = $night_rain;
        // $save->date = $date;
        
        // if ($save->save()) {
        //   # code...
        //   echo "Weather Row added successfully."."<br>";

        // }else{
        //   echo "Insert Error";
        // }




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
        
        // if ($save->save()) {
        //   # code...
        //   echo "Weather Row added successfully."."<br>";

        // }else{
        //   echo "Insert Error";
        // }
        $save->save();
        // echo "Weather Row added successfully."."<br>";

        $des = weatherModel::all()->sortByDesc("id")->first()->description;
        $ma = weatherModel::all()->sortByDesc("id")->first()->max_tem;
        $mi = weatherModel::all()->sortByDesc("id")->first()->min_tem;
        $day = weatherModel::all()->sortByDesc("id")->first()->day_rain;
        $night = weatherModel::all()->sortByDesc("id")->first()->night_rain;
        // echo $des;
        // echo $ma;
        // echo $mi;
        // echo $day;
        // echo $night;


        ///----------------send sms section ------------

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
          CURLOPT_POSTFIELDS => "{\n    \"message\":\"Good Morning beloved user! Weather : $des, Max: $ma C Min: $mi C, Day Rain : $day %, Night Rain : $night %\",\n    \"destinationAddresses\":[\"tel:all\"],\n    \"password\":\"c227ec9b7b066e1732bf20353fcf19d0\",\n    \"applicationId\":\"APP_053770\"\n}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Postman-Token: 821fc916-caba-4789-ae01-91a2f49da20b",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // if ($err) {
        //   echo "cURL Error #:" . $err;
        // } else {
        //   echo $response;
        // }

        // return view('okweather');
    }
}
