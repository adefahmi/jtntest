@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Encrypt
                </div>
                <div class="card-body">
                    <form method="POST" id="encrypt" action="{{ route('encrypt') }}">
                        @csrf
                    </form>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" form="encrypt" name="string" placeholder="Input Text">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" form="encrypt" value="Encrypt">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">
                    Decrypt
                </div>
                <div class="card-body">
                    <form method="POST" id="decrypt" action="{{ route('decrypt') }}">
                        @csrf
                    </form>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" form="decrypt" name="string" placeholder="Input Text">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" form="decrypt" value="Decrypt">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">
                    Result
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <textarea class="form-control" readonly>{{ $result ?? '' }}</textarea>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
