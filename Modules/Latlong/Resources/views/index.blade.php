@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lat Long</div>

                <div class="card-body">
                    <form method="get" id="form-latlong">
                    </form>
                    @include('latlong::form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" form="form-latlong">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Result</div>

                <div class="card-body">
                    {{-- @if (count($data) > 0) --}}
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 150px">Kode Pos</th>
                                        <td style="width: 5px">:</td>
                                        <td>{{ $data['kode_pos'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px">Desa</th>
                                        <td style="width: 5px">:</td>
                                        <td>{{ $data['desa'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px">Kecamatan</th>
                                        <td style="width: 5px">:</td>
                                        <td>{{ $data['kecamatan'] ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 150px">Kabupaten/Kota</th>
                                        <td style="width: 5px">:</td>
                                        <td>{{ $data['kota'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px">Provinsi</th>
                                        <td style="width: 5px">:</td>
                                        <td>{{ $data['provinsi'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px">Negara</th>
                                        <td style="width: 5px">:</td>
                                        <td>{{ $data['negara'] ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
