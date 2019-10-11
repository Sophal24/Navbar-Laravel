<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class textareaModel extends Model
{
    //
    protected $table="textarea";
    protected $fillable = [
    	"text",
    ];
}
