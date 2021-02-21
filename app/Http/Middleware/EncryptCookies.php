<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array 
     */ 
	 //'cet_baomat','cet_baomathon',
    protected $except = [
        
    ];
}
