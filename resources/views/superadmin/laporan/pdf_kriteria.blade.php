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
    <h3 style="text-align: center">LAPORAN DATA KRITERIA
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Kriteria</th>
            <th>Jenis</th>
            <th>Bobot</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jenis}}</td>
            <td>{{$item->bobot}}</td>
        </tr>
        @endforeach
    </table>

    {{-- <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />Mengetahui, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                Kertak Hanyar<br /><br /><br /><br />

                <u>-</u><br />
                Pimpinan Cabang II
            </td>
        </tr>
    </table> --}}
</body>

</html>