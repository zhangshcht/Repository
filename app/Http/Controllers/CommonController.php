<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function startcurl($number)
    {
        $curl = new \Curl\Curl();
        $code = rand(111111,999999);
        $curl->get('http://www.xiaohigh.com/sendMessage/index.php?to='.$number.'&code='.$code.'&web=lamp132&class=117');
        $curl->close();
        return $code;
    }
}
