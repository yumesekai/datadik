<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/87e99eca86.js" crossorigin="anonymous"></script>
    <title>Rekap Laporan Ekstra Priode {{$rekap->bulan->translatedFormat('F Y')}}   </title>
    <style type='text/css'>
        body {font-family:"DeJaVu Sans Mono", monospace;font-size:11pt;padding:0;margin:0;}
        a {color: #0000FF}
        a:hover {text-decoration:underline}
        table {border-collapse:collapse}
        td {padding-left: 5px;}
        .t {font-family:Calibri;text-align:left;vertical-align:bottom;font-size:14pt;}
        .r1 {font-weight:bold;text-align:center}
        .page-break {page-break-after: always;}
        .d-none {display: none;}
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            /** Extra personal styles **/
            background-color: #eaeaea;
            color: black;
            text-align: center;
            line-height: 1.5cm;
        }
    </style>
</head>
<body>

<div class="page-break">
<table align="center" class='t'>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            <img src="{{ public_path('img/KOP SMKN1KUTSEL.png') }}" width="700">
        </td>
    </tr>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Rekap Pelaksanaan Ekstrakurikuler Priode {{$rekap->bulan->translatedFormat('F Y')}}   
        </td>
    </tr>
   
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Tahun Pelajaran 2024/2025
        </td>
    </tr>
    </table>
    <br>
    <table border="1" align="center" width="930px" style="font-size:10pt; padding-top: 10px;">
    <thead>
    <tr>
        <th width="4%" rowspan="4" style="font-family:arial">No</th>
        <th width="25%" rowspan="4" style="font-family:arial">Nama</th>
        <th width="25%" rowspan="4" style="font-family:arial">EKSTRA</th>
        <th width="46%" colspan="10" style="font-family:arial">Bulan</th>
    </tr>
    <tr>
        <th colspan="2" style="font-family:arial">Minggu Ke-1</th>
        <th colspan="2" style="font-family:arial">Minggu Ke-2</th>
        <th colspan="2" style="font-family:arial">Minggu Ke-3</th>
        <th colspan="2" style="font-family:arial">Minggu Ke-4</th>
        <th colspan="2" style="font-family:arial">Minggu Ke-5</th>
    </tr>
    <tr>
        <th style="font-family:arial">Sabtu</th>
        <th style="font-family:arial">Minggu</th>
        <th style="font-family:arial">Sabtu</th>
        <th style="font-family:arial">Minggu</th>
        <th style="font-family:arial">Sabtu</th>
        <th style="font-family:arial">Minggu</th>
        <th style="font-family:arial">Sabtu</th>
        <th style="font-family:arial">Minggu</th>
        <th style="font-family:arial">Sabtu</th>
        <th style="font-family:arial">Minggu</th>
    </tr>
    <tr>
        @if( $rekap->sabtu_m1 != null)
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->sabtu_m1->translatedFormat('d-m-Y') }}</th>
        @else
        <th style="font-family:arial; font-size: 10px;"></th>
        @endif
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->minggu_m1->translatedFormat('d-m-Y') }}</th>
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->sabtu_m2->translatedFormat('d-m-Y') }}</th>
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->minggu_m2->translatedFormat('d-m-Y') }}</th>
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->sabtu_m3->translatedFormat('d-m-Y') }}</th>
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->minggu_m3->translatedFormat('d-m-Y') }}</th>
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->sabtu_m4->translatedFormat('d-m-Y') }}</th>
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->minggu_m4->translatedFormat('d-m-Y') }}</th>
        @if( $rekap->sabtu_m5 != null)
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->sabtu_m5->translatedFormat('d-m-Y') }}</th>
        @else
        <th style="font-family:arial; font-size: 10px;"></th>
        @endif
        @if( $rekap->minggu_m5 != null)
        <th style="font-family:arial; font-size: 10px;">{{ $rekap->minggu_m5->translatedFormat('d-m-Y') }}</th>
        @else
        <th style="font-family:arial; font-size: 10px;"></th>
        @endif
    </tr>
    </thead>
    
    @foreach ($laporan_all as $data)
    <tr>
        <td style="font-family:arial" align="center">{{ $loop->iteration }}</td>
        <td style="font-family:arial">{{ $data->pembina_ekskul}}</td>
        <td style="font-family:arial">{{ $data->nama_ekskul}}</td>
        @if ($rekap->sabtu_m1 != null)
            @if ($data->tgl_pelaksanaan_m1 == $rekap->sabtu_m1 || $data->tgl_pelaksanaan_m2 == $rekap->sabtu_m1 
            || $data->tgl_pelaksanaan_m3 == $rekap->sabtu_m1 || $data->tgl_pelaksanaan_m4 == $rekap->sabtu_m1)
            <td><center>&radic;<center></td>
            @endif
        @else
        <td style="background-color: black;"></td>
        @endif

        @if ($data->tgl_pelaksanaan_m1 == $rekap->minggu_m1 || $data->tgl_pelaksanaan_m2 == $rekap->minggu_m1 
        || $data->tgl_pelaksanaan_m3 == $rekap->minggu_m1  || $data->tgl_pelaksanaan_m4 == $rekap->minggu_m1 )
        <td><center>&radic;<center></td>
        @else
        <td></td>
        @endif
        
        @if ($data->tgl_pelaksanaan_m1 == $rekap->sabtu_m2 || $data->tgl_pelaksanaan_m2 == $rekap->sabtu_m2 
        || $data->tgl_pelaksanaan_m3 == $rekap->sabtu_m2 || $data->tgl_pelaksanaan_m4 == $rekap->sabtu_m2)
        <td><center>&radic;<center></td>
        @else
        <td></td>
        @endif
        
        @if ($data->tgl_pelaksanaan_m1 == $rekap->minggu_m2 || $data->tgl_pelaksanaan_m2 == $rekap->minggu_m2 
        || $data->tgl_pelaksanaan_m3 == $rekap->minggu_m2 || $data->tgl_pelaksanaan_m4 == $rekap->minggu_m2)
        <td><center>&radic;<center></td>
        @else
        <td></td>
        @endif

        @if ($data->tgl_pelaksanaan_m1 == $rekap->sabtu_m3 || $data->tgl_pelaksanaan_m2 == $rekap->sabtu_m3 
        || $data->tgl_pelaksanaan_m3 == $rekap->sabtu_m3 || $data->tgl_pelaksanaan_m4 == $rekap->sabtu_m3)
        <td><center>&radic;<center></td>
        @else
        <td></td>
        @endif

        @if ($data->tgl_pelaksanaan_m1 == $rekap->minggu_m3 || $data->tgl_pelaksanaan_m2 == $rekap->minggu_m3 
        || $data->tgl_pelaksanaan_m3 == $rekap->minggu_m3 || $data->tgl_pelaksanaan_m4 == $rekap->minggu_m3)
        <td><center>&radic;<center></td>
        @else
        <td></td>
        @endif

        @if ($data->tgl_pelaksanaan_m1 == $rekap->sabtu_m4 || $data->tgl_pelaksanaan_m2 == $rekap->sabtu_m4 
        || $data->tgl_pelaksanaan_m3 == $rekap->sabtu_m4 || $data->tgl_pelaksanaan_m4 == $rekap->sabtu_m4)
        <td><center>&radic;<center></td>
        @else
        <td></td>
        @endif

        @if ($data->tgl_pelaksanaan_m1 == $rekap->minggu_m4 || $data->tgl_pelaksanaan_m2 == $rekap->minggu_m4 
        || $data->tgl_pelaksanaan_m3 == $rekap->minggu_m4 || $data->tgl_pelaksanaan_m4 == $rekap->minggu_m4)
        <td><center>&radic;<center></td>
        @else
        <td></td>
        @endif
        @if ($rekap->sabtu_m5 != "")
            @if ($data->tgl_pelaksanaan_m1 == $rekap->sabtu_m5 || $data->tgl_pelaksanaan_m2 == $rekap->sabtu_m5 
            || $data->tgl_pelaksanaan_m3 == $rekap->sabtu_m5 || $data->tgl_pelaksanaan_m4 == $rekap->sabtu_m5)
            <td><center>&radic;<center></td>
            @else
            <td></td>
            @endif
        @else
        <td style="background-color: black;"></td>
        @endif
        @if ($rekap->minggu_m5 != null)
            @if ($data->tgl_pelaksanaan_m1 == $rekap->minggu_m5 || $data->tgl_pelaksanaan_m2 == $rekap->minggu_m5 
            || $data->tgl_pelaksanaan_m3 == $rekap->minggu_m5 || $data->tgl_pelaksanaan_m4 == $rekap->minggu_m5)
            <td><center>&radic;<center></td>
            @else
            <td></td>
            @endif
        @else
        <td style="background-color: black;"></td>
        @endif
    </tr>
    @endforeach
    </table>

    <table align="center" width="640px" style="font-size:12pt; padding-top: 30px;">
    <tr>
        <td>Mengetahui,</td>
        <td style="padding-left: 25%;">Kuta Selatan, </td>
    </tr>
    <tr>
        <td>Kepala Sekolah</td>
        <td style="padding-left: 25%;">Pembina Ekstrakurikuler</td>
    </tr>
    <tr>
        <td height="70px"></td>
        <td></td>
    </tr>
    <tr>
        <td><u>Drs. I Nyoman Supartha, M.Pd</u></td>
        <td style="padding-left: 25%;"><u></u></td>
    </tr>
    <tr>
        <td>NIP. 19670708 200701 1 033</td>
        <td></td>
    </tr>
    </table>
    </div>
    <!-- / end of page 1 -->

    </body>
</html>

