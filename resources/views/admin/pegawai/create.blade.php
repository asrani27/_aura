@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="/admin/data/pegawai" class="btn btn-flat btn-warning"><i class="fa fa-backward"></i> Kembali</a> <br /> <br />
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="post" action="/admin/data/pegawai/create">
                @csrf
                <div class="box-body">
                <div class="form-group">
                        <label class="col-sm-2 control-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nip">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">JENIS KELAMIN</label>
                        <div class="col-sm-10">
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="L">laki-laki</option>
                                <option value="P">perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ALAMAT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">TELEPON</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telp" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">PANGKAT</label>
                        <div class="col-sm-10">
                        <select name="pangkat_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($pangkat as $pan )
                            <option value="{{$pan->id}}">{{$pan->nama_pangkat}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">GOLONGAN</label>
                        <div class="col-sm-10">
                        <select name="golongan_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($golongan as $gol )
                            <option value="{{$gol->id}}">{{$gol->nama_golongan}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">JABATAN</label>
                        <div class="col-sm-10">
                        <select name="jabatan_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($jabatan as $jab )
                            <option value="{{$jab->id}}">{{$jab->nama_jabatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">STATUS PEGAWAI</label>
                        <div class="col-sm-10">
                            <select name="status_pegawai" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="PNS">PNS</option>
                                <option value="TEKON">TEKON</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right" onclick="return confirm('Yakin sudah sesuai?');"><i class="fa fa-save"></i> Simpan Data</button>
                </div>
                <!-- /.box-footer -->
            </form>
            <!-- /.box-body -->
        </div>

<!-- /.box -->
    </div>
</div>
@endsection
@push('js')

@endpush
