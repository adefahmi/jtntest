<div class="form-group">
    <label for="nomor">No Handphone</label>
    <input type="number"
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
            data-placeholder="Pilih Provider.."
            form="form-handphone">
            <option></option>

    </select>
</div>


@push('custom_js')
    <script>
        $('#input-provider_id').select2({
            // minimumInputLength: 3,
            ajax: {
                url: '/api/providers',
                dataType: 'json',
            },
        });
    </script>
@endpush
