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
                <h3 class="box-title">Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="post" action="/pegawai/data/okb/edit/{{$data->id}}"
                enctype="multipart/form-data">
                @csrf

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pelaksanaan kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pelaksanaankegiatan"
                                value="{{$data->pelaksanaankegiatan}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Hasil</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hasil" value="{{$data->hasil}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">nopol</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nopol" value="{{$data->nopol}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Roda</label>
                        <div class="col-sm-10">
                            <select name="roda" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="2" {{$data->roda == '2' ? 'selected':''}}>Roda 2</option>
                                <option value="4" {{$data->roda == '4' ? 'selected':''}}>Roda 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">nama pemilik stnk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="namapemiliksesuaistnk"
                                value="{{$data->namapemiliksesuaistnk}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">masa laku pajak</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="masalakupajak"
                                value="{{$data->masalakupajak}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">no hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nohp" value="{{$data->nohp}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Upload</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Update
                        Data</button>
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