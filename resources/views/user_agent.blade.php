
@extends('layout')
@section('title')User agent @endsection
@section('contant')
    <h1 style="text-align: center">{{$data->first->id->user_agent}}</h1>
    <table border="1">
        <tr>
            <td>Url</td>
            <td>Ip adress</td>
            <td>create</td>
        </tr>
        @foreach($data as $row)
            <tr>
                <td>{{$row->url}}</td>
                <td>{{$row->ip_adress}}</td>
                <td>{{$row->created_at}}</td>
            </tr>
        @endforeach
    </table>

@endsection


