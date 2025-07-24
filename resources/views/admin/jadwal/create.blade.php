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

<form method="POST" action="/admin/data/jadwal/create">
    @csrf
    <div class="form-group">
        <label for="tgl_kegiatan">Tanggal Kegiatan</label>
        <input type="date" class="form-control" name="tgl_kegiatan" required>
    </div>

    <div class="form-group">
        <label for="pegawai_id">Pilih Pegawai</label>
        <select name="pegawai_id" class="form-control" required>
            <option value="">-pilih-</option>
            @foreach ($pegawai as $peg )
            <option value="{{$peg->id}}">{{$peg->nama}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="waktu_mulai">Waktu Mulai</label>
        <input type="time" class="form-control" name="waktu_mulai" required>
    </div>

    <div class="form-group">
        <label for="waktu_selesai">Waktu Selesai</label>
        <input type="time" class="form-control" name="waktu_selesai" required>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" required>
    </div>

    <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select name="kecamatan" class="form-control" required>
            <option value="">-pilih-</option>
            <option value="Banjarmasin Selatan">Banjarmasin Selatan</option>
            <option value="Banjarmasin Timur">Banjarmasin Timur</option>
        </select>
    </div>

     <div class="form-group">
        <label for="kelurahan">Kelurahan</label>
        <select name="kelurahan" class="form-control" required>
            <option value="">-pilih-</option>
            <option value="Basirih Selatan">Basirih Selatan</option>
             <option value="Kelayan Barat">Kelayan Barat</option>
            <option value="Kelayan Dalam">Kelayan Dalam</option>
            <option value="Kelayan Tengah">Kelayan Tengah</option>
            <option value="Kelayan Timur">Kelayan Timur</option>
            <option value="Kelayan Selatan">Kelayan Selatan</option>
            <option value="Mantuil">Mantuil</option>
            <option value="Murung Raya">Murung Raya</option>
            <option value="Pekauman">Pekauman</option>
            <option value="Pemurus Baru">Pemurus Baru</option>
            <option value="Pemurus Dalam">Pemurus Dalam</option>
            <option value="Tanjung Pagar">Tanjung Pagar</option>
            <option value="Benua Anyar">Benua Anyar</option>
            <option value="Karang Mekar">Karang Mekar</option>
            <option value="Kebun Bunga">Kebun Bunga</option>
            <option value="Kuripan">Kuripan</option>
            <option value="Pekauman Raya">Pekauman Raya</option>
            <option value="Pemurus Luar">Pemurus Luar</option>
            <option value="Pengambangan">Pengambangan</option>
            <option value="Sungai Bilu">Sungai Bilu</option>
            <option value="Sungai Lulut">Sungai Lulut</option>
        </select>
    </div>
    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" readonly required>
        <input type="hidden" id="latitude" name="latitude" required>
        <input type="hidden" id="longitude" name="longitude" required>
    </div>

    <!-- Peta -->
    <div id="peta"></div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right" onclick="return confirm('Yakin sudah sesuai?');"><i
                class="fa fa-save"></i> Simpan Data</button>
    </div>
    <!-- /.box-footer -->
</form>
<!-- /.box-body -->
</div>

@endsection

@push('js')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>

<script>
    // Inisialisasi peta
var map = L.map('peta').setView([-3.319437, 114.590769], 16);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

// Menambahkan marker pada peta dan menyimpan koordinat ketika peta diklik
var marker;
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
            // Cek jika data ada dan ambil nama lokasi
            var locationName = data.display_name || "Lokasi tidak ditemukan";
            document.getElementById('lokasi').value = locationName;
        })
        .catch(error => {
            console.error('Error reverse geocoding:', error);
        });

        
    // Menambahkan marker di lokasi yang diklik
    if (marker) {
        map.removeLayer(marker);
    }
    marker = L.marker([lat, lng]).addTo(map);

});

// Menambahkan GeoSearch Control (Pencarian Lokasi)
const providerOSM = new GeoSearch.OpenStreetMapProvider();

// GeoSearch Control
const search = new GeoSearch.GeoSearchControl({
    provider: providerOSM,
    style: 'icon',
    searchLabel: 'Klik untuk mencari lokasi',
    autoClose: true, // Menutup pencarian setelah memilih lokasi
    showMarker: true, // Menampilkan marker setelah pencarian
    retainZoomLevel: true, // Retain the zoom level when search result is selected
    showPopup: true // Menampilkan popup pada marker yang dipilih
});

// Menambahkan kontrol pencarian ke peta
map.addControl(search);

</script>
@endpush