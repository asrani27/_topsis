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

            </td>
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA HASIL
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Ranking</th>
            <th>Pegawai</th>
            <th>Jarak D +</th>
            <th>Jarak D -</th>
            <th>Preferensi (Vi)</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach($hasil as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item['nama'] }}</td>
            <td>{{ number_format($item['d_plus'], 4) }}</td>
            <td>{{ number_format($item['d_minus'], 4) }}</td>
            <td><strong>{{ number_format($item['preferensi'], 4) }}</strong></td>
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