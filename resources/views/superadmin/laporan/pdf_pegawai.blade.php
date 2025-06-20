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
    <h3 style="text-align: center">LAPORAN DATA PEGAWAI
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>Jkel</th>
            <th>telp</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jabatan}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->agama}}</td>
            <td>{{$item->jkel}}</td>
            <td>{{$item->telp}}</td>
        </tr>
        @endforeach
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