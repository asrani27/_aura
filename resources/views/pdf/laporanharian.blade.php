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
            <td></td>
            <td style="text-align: center">
                <span style="font-size: 18px; font-weight:bold">
                    LAPORAN KEGIATAN<br />
                    PELAKSANAAN PENDATAAN VERIFIKASI KENDARAAN BERMOTOR<br />
                </span><br />
            </td>
            <td></td>
        </tr>
    </table>
    <hr>
    <br />
    <table width="100%">
        <tr>
            <td style="vertical-align: top"><strong>I.</strong></td>
            <td><strong>PELAKSANAAN KEGIATAN</strong><br />
                {{$data->pelaksanaankegiatan}}
            </td>
        </tr>
        <br />
        <tr>
            <td style="vertical-align: top"><strong>II.</strong></td>
            <td><strong>HASIL YANG DI CAPAI</strong><br />
                {{$data->hasil}}
            </td>
        </tr>
        <br />
        <tr>
            <td style="vertical-align: top"><strong>III.</strong></td>
            <td><strong>DOKUMENTASI</strong><br />
                {{$data->nopol}}, {{$data->nama}}, {{$data->alamat}} <br />
                @php
                $filePath = public_path('/storage/uploads/'.$data->dokumentasi);
                @endphp

                @if (file_exists($filePath))
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('/storage/uploads/'.$data->dokumentasi))) }}"
                    width="200px">
                @else

                @endif

            </td>
        </tr>
        <br />
        <tr>
            <td style="vertical-align: top"><strong>VI.</strong></td>
            <td><strong>PENUTUP</strong><br />
                Demikian laporan kegiatan ini disampaikan, sebagai salah satu bahan pertanggungjawaban kegiatan yang
                telah dilaksanakan oleh Pelaksana Tugas.
            </td>
        </tr>
        </table>
        <br />
        <br />
        Dibuat di Banjarmasin, Tanggal : {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}
        <table width="100%">
            <tr>
                <td width="70%" style="vertical-align: top">
                    Yang Melaksanakan Kegiatan :<br /><br /><br /><br /><br />

                    (.....................)<br />
                    {{$data->pegawai->nama}}
            </td>
            <td style="vertical-align: top">
                Pimpinan<br />
                <br /><br /><br /><br />

                <u>ANNI HANISYAH, SE,MM</u><br />
                NIP. 19670505 198907 2 001
            </td>
        </tr>
    </table>
    <br />
</body>

</html>