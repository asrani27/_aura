@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="/pegawai/data/okb" class="btn btn-flat btn-warning"><i class="fa fa-backward"></i> Kembali</a> <br />
        <br />
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="post" action="/pegawai/data/okb/create" enctype="multipart/form-data">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Berdasarkan Jadwal & Lokasi</label>
                        <div class="col-sm-10">
                            <select name="jadwal_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($jadwal as $item)
                                <option value="{{$item->id}}">{{\Carbon\Carbon::parse($item->tgl_kegiatan)->format('d M
                                    Y')}} - Lokasi : {{$item->lokasi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pelaksanaan kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pelaksanaankegiatan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Hasil</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hasil" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No polisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nopol" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">roda</label>
                        <div class="col-sm-10">
                            <select name="roda" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="2">Roda 2</option>
                                <option value="4">Roda 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">nama pemilik stnk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="namapemiliksesuaistnk" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">masa laku pajak</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="masalakupajak" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">no hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nohp" required>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Status Kendaraan BerMotor</label>
                        <div class="col-sm-10">
                            <select name="statusmotor" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="Baik / Layak Jalan">Baik / Layak Jalan</option>
                                <option value="Tidak Layak Jalan">Tidak Layak Jalan</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Burat">Rusak Berat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Upload</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan
                                Data</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

            </form>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
@push('js')
@endpush