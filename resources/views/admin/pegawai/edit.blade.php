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
                <h3 class="box-title">Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="post" action="/admin/data/pegawai/edit/{{$data->id}}">
                @csrf
                <div class="box-body">
                <div class="form-group">
                        <label class="col-sm-2 control-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik" required value="{{$data->nik}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nip" value="{{$data->nip}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required value="{{$data->nama}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jkel</label>
                        <div class="col-sm-10">
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="L" {{$data->jenis_kelamin == 'L' ? 'selected':''}}>laki-laki</option>
                                <option value="P" {{$data->jenis_kelamin == 'P' ? 'selected':''}}>perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" required value="{{$data->alamat}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telp" required value="{{$data->telp}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">pangkat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pangkat" value="{{$data->pangkat}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">golongan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="golongan"  value="{{$data->golongan}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jabatan" required value="{{$data->jabatan}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">StatusPegawai</label>
                        <div class="col-sm-10">
                            <select name="status_pegawai" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="PNS" {{$data->status_pegawai == 'PNS' ? 'selected':''}}>PNS</option>
                                <option value="TEKON" {{$data->status_pegawai == 'TEKON' ? 'selected':''}}>TEKON</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
<!-- /.box-body -->
<div class="box-footer">
    <button type="submit" class="btn btn-primary pull-right" onclick="return confirm('Yakin sudah sesuai?');"><i class="fa fa-save"></i> Update Data</button>
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