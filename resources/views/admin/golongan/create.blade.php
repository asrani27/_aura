@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="/admin/data/golongan" class="btn btn-flat btn-warning"><i class="fa fa-backward"></i> Kembali</a> <br /> <br />
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
            <form class="form-horizontal" method="post" action="/admin/data/golongan/create">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Golongan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_golongan" required>
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
