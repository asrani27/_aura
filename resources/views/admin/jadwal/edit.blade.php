@extends('layouts.app')
@push('css')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css">
<style>
    #peta {
        height: 400px;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="/admin/data/jadwal" class="btn btn-flat btn-warning"><i class="fa fa-backward"></i> Kembali</a> <br />
        <br />
    </div>
</div>

<form method="POST" action="/admin/data/jadwal/edit/{{ $data->id }}">
    @csrf
    <div class="form-group">
        <label for="tgl_kegiatan">Tanggal Kegiatan</label>
        <input type="date" class="form-control" name="tgl_kegiatan" required value="{{ $data->tgl_kegiatan }}">
    </div>

    <div class="form-group">
        <label for="pegawai_id">Pilih Pegawai</label>
        <select name="pegawai_id" class="form-control" required>
            <option value="">-pilih-</option>
            @foreach ($pegawai as $peg )
            <option value="{{ $peg->id }}" {{ $data->pegawai_id == $peg->id ? 'selected' : '' }}>{{ $peg->nama }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="waktu_mulai">Waktu Mulai</label>
        <input type="time" class="form-control" name="waktu_mulai" value="{{ $data->waktu_mulai }}" required>
    </div>

    <div class="form-group">
        <label for="waktu_selesai">Waktu Selesai</label>
        <input type="time" class="form-control" name="waktu_selesai" value="{{ $data->waktu_selesai }}" required>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" value="{{ $data->keterangan }}" required>
    </div>


    <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select name="kecamatan" class="form-control" required>
            <option value="">-pilih-</option>
            <option value="Banjarmasin Selatan" {{ $data->kecamatan == 'Banjarmasin Selatan' ? 'selected' : '' }}>Banjarmasin Selatan</option>
            <option value="Banjarmasin Timur" {{ $data->kecamatan == 'Banjarmasin Timur' ? 'selected' : '' }}>Banjarmasin Timur</option>
        </select>
    </div>

    <div class="form-group">
    <label for="kelurahan">Kelurahan</label>
        <select name="kelurahan" class="form-control" required>
            <option value="">-pilih-</option>
            <option value="Basirih Selatan" {{ $data->kelurahan == 'Basirih Selatan' ? 'selected' : '' }}>Basirih Selatan</option>
            <option value="Kelayan Dalam" {{ $data->kelurahan == 'Kelayan Dalam' ? 'selected' : '' }}>Kelayan Dalam</option>
            <option value="Kelayan Tengah" {{ $data->kelurahan == 'Kelayan Tengah' ? 'selected' : '' }}>Kelayan Tengah</option>
            <option value="Kelayan Timur" {{ $data->kelurahan == 'Kelayan Timur' ? 'selected' : '' }}>Kelayan Timur</option>
            <option value="Kelayan Selatan" {{ $data->kelurahan == 'Kelayan Selatan' ? 'selected' : '' }}>Kelayan Selatan</option>
            <option value="Mantuil" {{ $data->kelurahan == 'Mantuil' ? 'selected' : '' }}>Mantuil</option>
            <option value="Benua Anyar" {{ $data->kelurahan == 'Benua Anyar' ? 'selected' : '' }}>Benua Anyar</option>
            <option value="Karang Mekar" {{ $data->kelurahan == 'Karang Mekar' ? 'selected' : '' }}>Karang Mekar</option>
            <option value="Kuripan" {{ $data->kelurahan == 'Kuripan' ? 'selected' : '' }}>Kuripan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $data->lokasi }}" readonly required>
        <input type="hidden" id="latitude" name="latitude" value="{{ $data->latitude }}" required>
        <input type="hidden" id="longitude" name="longitude" value="{{ $data->longitude }}" required>
    </div>

    <!-- Peta -->
    <div id="peta"></div>



    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right" onclick="return confirm('Yakin sudah sesuai?');"><i
                class="fa fa-save"></i> Update Data</button>
    </div>
</form>
@endsection

@push('js')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>

<script>
    // Inisialisasi peta
var map = L.map('peta').setView([{{ $data->latitude }}, {{ $data->longitude }}], 13); // Gunakan data koordinat yang ada
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

// Menambahkan marker pada peta dan menyimpan koordinat ketika peta diklik
var marker = L.marker([{{ $data->latitude }}, {{ $data->longitude }}]).addTo(map);  // Mark lokasi yang ada
marker.bindPopup("{{ $data->lokasi }}").openPopup();  // Tampilkan lokasi yang ada

map.on('click', function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    
    // Menyimpan koordinat ke dalam input tersembunyi
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
    document.getElementById('lokasi').value = "Latitude: " + lat + ", Longitude: " + lng;

    // Melakukan reverse geocoding untuk mendapatkan nama lokasi
    var latlng = e.latlng;
    var geocodeUrl = 'https://nominatim.openstreetmap.org/reverse?lat=' + lat + '&lon=' + lng + '&format=json';

    fetch(geocodeUrl)
        .then(response => response.json())
        .then(data => {
            var locationName = data.display_name || "Lokasi tidak ditemukan";
            document.getElementById('lokasi').value = locationName;
        })
        .catch(error => {
            console.error('Error reverse geocoding:', error);
        });

    // Mengubah marker lokasi
    map.removeLayer(marker);
    marker = L.marker([lat, lng]).addTo(map);
});

// Menambahkan GeoSearch Control (Pencarian Lokasi)
const providerOSM = new GeoSearch.OpenStreetMapProvider();

// GeoSearch Control
const search = new GeoSearch.GeoSearchControl({
    provider: providerOSM,
    style: 'icon',
    searchLabel: 'Klik untuk mencari lokasi',
    autoClose: true,
    showMarker: true,
    retainZoomLevel: true,
    showPopup: true
});

// Menambahkan kontrol pencarian ke peta
map.addControl(search);
</script>
@endpush