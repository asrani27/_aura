@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row">
  <div class="col-md-12">
      <a href="/admin/data/pegawai" class="btn btn-flat btn-warning"><i class="fa fa-backward"></i> Kembali</a> <br /> <br />
  </div>
</div>

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">

        <h1 class=" text-center">{{strtoupper($data->nama)}}</h1>

        <p class="text-muted text-center">NIP : {{$data->nip}}</p>
        <p class="text-muted text-center">NIK : {{$data->nik}}</p>

        <hr>
        <table width="100%">
            <tr style="border-bottom:1px solid black">
                <td width="50%">
                    <strong><i class="fa fa-home margin-r-5"></i> Alamat</strong>
                    <p class="text-muted">
                      {{$data->alamat}}
                    </p>
            
                </td>
                <td>
                    <strong><i class="fa fa-user margin-r-5"></i> Jenis Kelamin</strong>

                    <p class="text-muted"> {{$data->jenis_kelamin}}</p>
                </td>
            </tr>

            
            <tr style="border-bottom:1px solid black">
                <td width="50%">
                    <br>
                    <strong><i class="fa fa-user margin-r-5"></i> Telp</strong>

                    <p class="text-muted"> {{$data->telp}}</p>
            
                </td>
                <td>
                    <strong><i class="fa fa-user margin-r-5"></i> Pangkat</strong>

                    <p class="text-muted"> {{$data->pangkat}}</p>
                </td>
            </tr>

            
            <tr style="border-bottom:1px solid black">
                <td width="50%">
                    <br>
                    
        <strong><i class="fa fa-user margin-r-5"></i> Golongan</strong>

               <p class="text-muted"> {{$data->golongan}}</p>
            
                </td>
                <td>
                    <strong><i class="fa fa-user margin-r-5"></i> Jabatan</strong>

                    <p class="text-muted"> {{$data->jabatan}}</p>
                </td>
            </tr>


        </table>
       

       

      

       


       

        <strong><i class="fa fa-user margin-r-5"></i> Status Pegawai</strong>

        <p class="text-muted"> {{$data->status_pegawai}}</p>

      </div>
      <!-- /.box-body -->
    </div>

  </div>

</div>
@endsection
@push('js')

@endpush