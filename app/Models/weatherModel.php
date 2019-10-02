<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class weatherModel extends Model
{
    //
    protected $table="weather_data";
    protected $fillable = [
    	"description",
    	"max_tem",
    	"min_tem",
    	"day_rain",
    	"night_rain",
    	"date"
    ];
}

