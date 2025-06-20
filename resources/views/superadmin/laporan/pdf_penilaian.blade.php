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
            <td style="text-align: left;" width="60%">

                <font size="20px"><b>PENILAIAN KINERJA PEGAWAI MENGGUNAKAN METODE TOPSIS<br />
                        PADA DESA SIMPUNG LAYUNG
                    </b></font>
            </td>
            <td width="15%">
                {{-- <img
                    src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/intan.png'))) }}"
                    width="300px"> --}}
            </td>
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA PENILAIAN
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                @foreach (kriteria() as $kriteria)
                <th>{{ $kriteria->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach (pegawai() as $pegawai)
            <tr>
                <td>{{ $pegawai->nama }}</td>
                @foreach (kriteria() as $kriteria)
                @php
                $nilai = $pegawai->penilaians->firstWhere('kriteria_id', $kriteria->id)?->nilai ?? '-';
                @endphp
                <td>{{ $nilai }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />Mengetahui, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                Pimpinan<br /><br /><br /><br />

                <br />
                (.....................)
            </td>
        </tr>
    </table>
</body>

</html>