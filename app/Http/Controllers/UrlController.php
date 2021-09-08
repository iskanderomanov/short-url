<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    function generateUrl(Request $request){
        $input = $request->all();

        //    add "http://" if it doesn't exist
        if(!Str::startsWith($input['originalUrl'], 'http://') &&
            !Str::startsWith($input['originalUrl'], 'https://')){
            $input['originalUrl'] = 'http://' . $input['originalUrl'];
        }

        //check for re-url
        if(Url::where('originalUrl', $input['originalUrl'])->doesntExist()) {

            $input['originalUrl'];
            $input['generatedUrl'] = Str::random(5); //gives different urls for one link


            Url::create($input);

            $input['generatedUrl'] = $request->getHost() . '/' . $input['generatedUrl'];
            return response()->json(['data' => $input]);
        }else{

            $data = Url::where('originalUrl', $input['originalUrl'])->first();
            $data['generatedUrl'] = $request->getHost() . '/' . $data['generatedUrl'];
            return response()->json(['data' => $data]);
        }
    }
    function getUrl(){
        return view('home');
    }
}
