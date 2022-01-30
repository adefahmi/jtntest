@extends('layouts.app')

@section('content')
     <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Data No Handphone
            </div>
            <div id="contentData">
                <form method="post" id="form-handphone">
                    @csrf
                </form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nomor">No Handphone</label>
                        <input type="number"
                                id="input-nomor"
                                required
                                name="nomor"
                                class="form-control {{ $errors->has('nomor') ? 'is-invalid' : '' }}"
                                value="{{ old('nomor') ?: '' }}"
                                form="form-handphone">
                    </div>
                    <div class="form-group">
                        <label for="provider_id">Provider</label>
                        <select
                                class="select2 form-control{{ $errors->has('provider_id') ? ' is-invalid' : '' }}"
                                id="input-provider_id"
                                name="provider_id"
                                required
                                data-placeholder="Pilih Provider.."
                                form="form-handphone">

                        </select>
                    </div>
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-success" form="form-handphone">Save</button>
                    <button onclick="generate()" class="btn btn-primary">Auto</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_head')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('js')
<script>
     $(document).ready(function() {

        $('#input-provider_id').select2({
            allowClear: true,
            ajax: {
                url: '/api/providers',
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            },
        });

        // save
        $("#contentData").on("submit", "#form-handphone", function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/api/handphone',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data.meta.message);
                        clearForm();
                    },
                    error: function(data) {
                        alert(data.responseJSON.meta.message);
                    }
                });
            });
     });

     function clearForm()
        {
            $('#input-provider_id').val('').trigger("change");
            $('#input-nomor').val('').trigger("change");
        }

     function generate()
        {
            let url = '/api/generate';

            fetch(url)
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                clearForm();
                $('#input-nomor').val(data.data.nomor).trigger("change");
                var newOption = new Option(data.data.provider.nama, data.data.provider_id, false, true);
                $('#input-provider_id').append(newOption).trigger("change");
            })
        }

</script>
@endsection
