
@extends('layout')
@section('title')Ip adress @endsection
@section('contant')
    <h1 style="text-align: center">{{$data->first->id->ip_adress}}</h1>
    <table border="1">
        <tr>
            <td>Url</td>
            <td>User agent</td>
            <td>create</td>
        </tr>
        @foreach($data as $row)
            <tr>
                <td>{{$row->url}}</td>
                <td>{{$row->user_agent}}</td>
                <td>{{$row->created_at}}</td>
            </tr>
        @endforeach
    </table>

@endsection

