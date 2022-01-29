@extends('adminlte::page')

@section('title', 'Detail User')

@section('content_header')
<h1>Detail User</h1>
@stop

@section('content')
<p>Detail User</p>
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail User
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>NIK: </b>{{$user->nik}}</li>
                    <li class="list-group-item"><b>Name: </b>{{$user->name}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$user->email}}</li>
                    <li class="list-group-item"><b>Role: </b>{{strtoupper($user->roles()->first()->name)}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('users.index') }}">Kembali</a>

        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('footer', '2021')


