@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <hr>
                    <a href="{{ route('endec') }}" class="btn btn-sm btn-success">Encrypt & Decrypt</a>
                    <div class="card mt-5">
                        <div class="card-header">
                            <h5 class="text-center"><b>TECHNICAL TEST</b></h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('handphone.input') }}" target="_blank" class="btn btn-sm btn-info">Form Input</a>
                            <a href="{{ route('handphone.output') }}" target="_blank" class="btn btn-sm btn-primary">Output</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
