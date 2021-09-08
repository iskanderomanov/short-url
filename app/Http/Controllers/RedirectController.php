<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RedirectController extends Controller
{
    public function redirectUrl(Request $request,Url $url,Statistic $statistic,$some){
        $urls = $url::where('generatedUrl', $some)->first();
        if($urls){
            $data['user_agent'] = $request->userAgent();;
            $data['ip_adress'] = $request->ip();
            $data['url'] =  $urls['originalUrl'];
            $statistic->create($data);
            $originUrl = $urls['originalUrl'];

            return redirect()->away($originUrl);
        }else{
            return abort(404);
        }
    }
}
