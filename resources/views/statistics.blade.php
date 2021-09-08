
@extends('layout')
@section('title')Statistic @endsection
@section('contant')
    <h1 style="text-align: center">Statistic</h1>
    <table border="1px">
            <tr>
                <td>Url</td>
                <td>Ip adress</td>
                <td>User-agent</td>
                <td>create</td>
            </tr>
            @foreach($data as $row)
            <tr>
                <td><a href="{{route('urlId', $row->id)}}">{{$row->url}}</a></td>
                <td><a href="{{route('urlIp', $row->ip_adress)}}">{{$row->ip_adress}}</a></td>
                <td><a href="{{route('urlUserAgent', $row->id)}}">{{$row->user_agent}}</a></td>
                <td>{{$row->created_at}}</td>
            </tr>
            @endforeach
        </table>
@endsection
