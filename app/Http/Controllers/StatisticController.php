<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{

    public function index(Statistic $statistic)
    {
        $data = $statistic->all();
        $urls = $statistic->select('url')->get();
        $ip = $statistic->select('ip_adress')->get();
        $userAgent = $statistic->select('user_agent')->get();

        return view('statistics', ['data' => $data,'url' => $urls, 'ip' => $ip, 'userAgent' => $userAgent]);
    }

    public function url(Statistic $statistic,$urlId)
    {
        $firstUrl = $statistic->where('id', $urlId)->select('url')->first();
        $data = $statistic->where('url', $firstUrl->url)->get();
        return view('urls', ['data' => $data]);
    }
    public function urlIp(Statistic $statistic,$urlIp)
    {
        $firstUrl = $statistic->where('ip_adress', $urlIp)->select('ip_adress')->first();
        $data = $statistic->where('ip_adress', $firstUrl->ip_adress)->get();
        return view('ip_adress', ['data' => $data]);
    }
    public function urlUserAgent(Statistic $statistic,$urlUserAgent)
    {
        $firstUrl = $statistic->where('id', $urlUserAgent)->select('user_agent')->first();
        $data = $statistic->where('user_agent', $firstUrl->user_agent)->get();
        return view('user_agent', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistic $statistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        //
    }
}
