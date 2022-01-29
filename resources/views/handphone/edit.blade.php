@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
<h1>Edit User</h1>
@stop

@section('content')
<p>Edit User</p>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left my-2">
            <a class="btn btn-success" href="{{ route('users.index') }}"> Kembali</a>
        </div>
    </div>
</div>

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit User
            </div>
            <form method="post" action="{{ route('users.update', $user->id) }}" id="form-user">
                @csrf
                @method('PUT')
            </form>
            <div class="card-body">
                @include('users.form', [
                    'roles' => $roles,
                ])
            <button type="submit" class="btn btn-primary" form="form-user">Submit</button>
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('footer', '2021')

