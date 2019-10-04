@extends('layouts.app')
@section('title','Weather')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body loginbackground">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p class="navbar-brand" href="#" style="font-size: 35px;">Weather</p>

                    <?php
                        date_default_timezone_set('Asia/Phnom_Penh');
                        $apiKey = "765273626bcafcd3600c8ecd20b5f3a1";
                        $cityId = "1821306";
                        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($ch, CURLOPT_VERBOSE, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        $response1 = curl_exec($ch);

                        curl_close($ch);
                        $data1 = json_decode($response1);
                        $currentTime = time();

                    ?>

                    <h2><?php echo $data1->name; ?> Current Weather Status</h2>
                    <div class="time">
                        <div><?php echo date("l g:i a", $currentTime); ?></div>
                        <div><?php echo date("jS F, Y",$currentTime); ?></div>
                        <div><?php echo ucwords($data1->weather[0]->description); ?></div>
                    </div>
                    <div class="weather-forecast">
                        <img
                            src="http://openweathermap.org/img/w/<?php echo $data1->weather[0]->icon; ?>.png"
                            class="weather-icon" /> <?php echo "Current Temperature : "; echo $data1->main->temp; ?> &deg;C
                    </div>
                    <div class="time">
                        <div>Humidity: <?php echo $data1->main->humidity; ?> %</div>
                        <div>Wind: <?php echo $data1->wind->speed; ?> km/h</div>
                        <div>
                            Current Temperature : 
                            <?php echo $data1->main->temp; ?> &deg;C
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
