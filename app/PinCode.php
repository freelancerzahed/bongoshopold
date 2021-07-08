<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinCode extends Model
{
    protected $fillable = [
        'pin_code','delivery_time', 'city','state',
    ];


    protected $table = 'pin_codes';
}
