@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="/pegawai/data/spt" class="btn btn-flat btn-warning"><i class="fa fa-backward"></i> Kembali</a> <br />
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
            <form class="form-horizontal" method="post" action="/pegawai/data/spt/create" enctype="multipart/form-data">
                @csrf

                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nomor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Keperluan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keperluan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">tujuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tujuan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Masuk</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_masuk" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Berlaku</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_berlaku" required>
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