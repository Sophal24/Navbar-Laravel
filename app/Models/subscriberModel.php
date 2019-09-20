<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscriberModel extends Model
{
    //
    protected $table="subscribers";
    protected $fillable = [
    	"subscriberId",
    	"status",
    	"frequency"
    ];
}
