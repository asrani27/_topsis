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
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/barabai.png'))) }}"
                    width="80px">
            </td>
            <td style="text-align: center;" width="60%">

                <font size="20px"><b>DINAS PENANAMAN MODAL PELAYANAN TERPADU SATU PINTU <br /> DAN TENAGA KERJA
                        KABUPATEN HULU SUNGAI TENGAH<br />
                    </b></font>
                Jl. Sibli Imansyah Barabai Barat, Bukat, Kec. Barabai, Kabupaten Hulu Sungai Tengah, Kalimantan Selatan
                71352
            </td>
            <td width="15%">
            </td>
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA JENIS USAHA
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Jenis</th>
            <th>Nama Jenis Usaha</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->nama}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />Mengetahui, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                Kepala Dinas<br /><br /><br /><br />

                <u>-</u><br />
                NIP.xxxxxxxxx
            </td>
        </tr>
    </table>
</body>

</html>