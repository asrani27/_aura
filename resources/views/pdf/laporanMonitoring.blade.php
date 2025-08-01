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
    <h3 style="text-align: center">LAPORAN MONITORING <br>

    </h3>
    <strong>Tanggal : {{\Carbon\Carbon::parse($tanggal)->format('d M Y')}}</strong><br />
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Jumlah Input OKB</th>
            <th>Detail Yang Di Input</th>
        </tr>
        @php
        $no =1;
        @endphp
        @forelse ($data as $index => $pegawai)
        @if ($pegawai->okb->count() > 0)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $pegawai->nama }}</td>
            <td>{{ $pegawai->okb->count() }}</td>
            <td>
                @if($pegawai->okb->isNotEmpty())
                <ul>
                    @foreach ($pegawai->okb as $okb)
                    <li>{{\Carbon\Carbon::parse($okb->created_at)->format('d M Y')}} - Nama Pemilik : {{ $okb->nama ??
                        '-' }} ({{ $okb->nopol }})</li>
                    @endforeach
                </ul>
                @else
                Tidak ada data
                @endif
            </td>
        </tr>
        @endif

        @empty
        <tr>
            <td colspan="4">Tidak ada data pegawai</td>
        </tr>
        @endforelse
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