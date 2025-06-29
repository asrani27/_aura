<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>

    <table width="100%">
        <tr>
            <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('background/logo.png'))) }}"
                    width="80px"> &nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="60%">
                UNIT PELAYANAN PENDAPATAN DAERAH 1<BR />
                BANJARMASIN PROVINSI KALIMANTAN SELATAN<br />
                JALAN JEND. A.YANI Km. 6 KODE POS. 70249 KALIMANTAN SELATAN
            </td>
            <td width="15%">
            </td>

        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN PEGAWAI PNS<br>

    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jkel</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Pangkat</th>
            <th>Golongan</th>
            <th>Jabatan</th>
            <th>StatusPegawai</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->nip}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jenis_kelamin}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->telp}}</td>
            <td>{{$item->pangkat}}</td>
            <td>{{$item->golongan}}</td>
            <td>{{$item->jabatan}}</td>
            <td>{{$item->status_pegawai}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                Pimpinan<br />
                <br /><br /><br /><br />

                <u>ANNI HANISYAH, SE,MM</u><br />
                NIP. 19670505 198907 2 001
            </td>
        </tr>
    </table>
</body>

</html>