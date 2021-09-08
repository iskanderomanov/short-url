@extends('layout')
@section('title')Url @endsection
@section('contant')
    <h1 style="text-align: center">{{$data->first->id->url}}</h1>
    <table border="1">
        <tr>
            <td>Ip adress</td>
            <td>User agent</td>
            <td>create</td>
        </tr>
        @foreach($data as $row)
            <tr border="1px">
                <td>{{$row->ip_adress}}</td>
                <td>{{$row->user_agent}}</td>
                <td>{{$row->created_at}}</td>
            </tr>
        @endforeach
    </table>

@endsection
