@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="/admin/data/user" class="btn btn-flat btn-warning"><i class="fa fa-backward"></i> Kembali</a> <br /> <br />
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
            <form class="form-horizontal" method="post" action="/admin/data/user/edit/{{$data->id}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" required value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" required  value="{{$data->username}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Passsword</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Masukkan Password lagi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password2" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Role/Hak Akses</label>
                        <div class="col-sm-10">
                            <select name="roles" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="admin" {{$data->roles == 'admin' ? 'selected':''}}>admin</option>
                                <option value="pegawai"  {{$data->roles == 'pegawai' ? 'selected':''}}>pegawai</option>
                                <option value="pimpinan"  {{$data->roles == 'pimpinan' ? 'selected':''}}>pimpinan</option>
                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 control-label">Pilih Pegawai</label>
                        <div class="col-sm-10">
                            <select name="pegawai_id" class="form-control">
                                <option value="">-pilih-</option>
                                @foreach($pegawai as $peg)
                                   <option value="{{$peg->id}}" {{$data->pegawai_id == $peg->id ? 'selected':''}}>{{$peg->nama}}</option>
                                 @endforeach
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