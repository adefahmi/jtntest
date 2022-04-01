<div class="form-group">
    <label for="latitude">Latitude</label>
    <input type="text"
            id="input-latitude"
            name="latitude"
            class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}"
            value="{{ request('latitude') ?: '' }}"
            form="form-latlong">
</div>
<div class="form-group">
    <label for="longitude">Longitude</label>
    <input type="text"
            id="input-longitude"
            name="longitude"
            class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}"
            value="{{ request('longitude') ?: '' }}"
            form="form-latlong">
</div>
