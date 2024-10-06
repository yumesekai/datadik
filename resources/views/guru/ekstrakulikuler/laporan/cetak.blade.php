<html>
<head>
    <title>Laporan {{$laporan->nama_ekskul}} {{$laporan->tgl_pelaksanaan_m1->translatedFormat('F Y')}}</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <style type='text/css'>
        body {font-family:arial;font-size:11pt;padding:0;margin:0;}
        a {color: #0000FF}
        a:hover {text-decoration:underline}
        table {border-collapse:collapse}
        td {padding-left: 5px;}
        .t {font-family:Calibri;text-align:left;vertical-align:bottom;font-size:14pt;}
        .r1 {font-weight:bold;text-align:center}
        .page-break {page-break-after: always;}
        .d-none {display: none;}
    </style>
</head>
<body>
<input type="text" id="jml_kegiatan" class="d-none" name="jml_kegiatan" value="{{$laporan->jml_kegiatan}}">

<div class="page-break">
<table align="center" class='t'>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            <img src="{{ public_path('img/KOP SMKN1KUTSEL.png') }}" width="652">
        </td>
    </tr>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Jurnal Kegiatan {{$laporan->nama_ekskul}} Priode {{$laporan->tgl_pelaksanaan_m1->translatedFormat('F Y')}}    
        </td>
    </tr>
   
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Tahun Pelajaran 2024/2025
        </td>
    </tr>
    </table>
    <br>
    <table border="1" align="center" width="640px" style="font-size:10pt; padding-top: 10px;">
    <tr>
        <th width="23%"><b>Tanggal</b></th>
        <th width="23%"><b>Nama Pembina</b></th>
        <th width="23%"><b>Materi</b></th>
        <th width="23%"><b>TTD</b></th>
    </tr>
    <tr>
        <td width="23%">{{$laporan->tgl_pelaksanaan_m1->translatedFormat('l, d F Y')}}</td>
        <td width="23%">{{Auth::user()->name}}</td>
        <td width="23%">{{$laporan->kegiatan_ekskul_m1}}</td>
        <td width="23%"></td>
    </tr>
    @if ($laporan->jml_kegiatan == '2' || $laporan->jml_kegiatan == '3' || $laporan->jml_kegiatan == '4')
    <tr>
        <td width="23%">{{$laporan->tgl_pelaksanaan_m2->translatedFormat('l, d F Y')}}</td>
        <td width="23%">{{Auth::user()->name}}</td>
        <td width="23%">{{$laporan->kegiatan_ekskul_m2}}</td>
        <td width="23%"></td>
    </tr>
    @endif
    @if ($laporan->jml_kegiatan == '3' || $laporan->jml_kegiatan == '4')
    <tr>
        <td width="23%">{{$laporan->tgl_pelaksanaan_m3->translatedFormat('l, d F Y')}}</td>
        <td width="23%">{{Auth::user()->name}}</td>
        <td width="23%">{{$laporan->kegiatan_ekskul_m3}}</td>
        <td width="23%"></td>
    </tr>
    @endif
    @if ($laporan->jml_kegiatan == '4')
    <tr>
        <td width="23%">{{$laporan->tgl_pelaksanaan_m4->translatedFormat('l, d F Y')}}</td>
        <td width="23%">{{Auth::user()->name}}</td>
        <td width="23%">{{$laporan->kegiatan_ekskul_m4}}</td>
        <td width="23%"></td>
    </tr>
    @endif
    </table>
    <table align="center" width="640px" style="font-size:12pt; padding-top: 30px;">
    <tr>
        <td width="23%">Mengetahui,</td>
        <td width="23%" style="padding-left: 25%;">Kuta Selatan, {{$laporan->tgl_pelaksanaan_m1->endOfMonth()->translatedFormat('d F Y')}}</td>
    </tr>
    <tr>
        <td width="23%">Kepala Sekolah</td>
        <td width="23%" style="padding-left: 25%;">Pembina Ekstrakurikuler</td>
    </tr>
    <tr>
        <td width="23%" height="70px"></td>
        <td width="23%"></td>
    </tr>
    <tr>
        <td width="23%"><u>Drs. I Nyoman Supartha, M.Pd</u></td>
        <td width="23%" style="padding-left: 25%;"><u>{{Auth::user()->name}}</u></td>
    </tr>
    <tr>
        <td width="23%">NIP. 19670708 200701 1 033</td>
        <td width="23%"></td>
    </tr>
    </table>
    </div>
    <!-- / end of page 1 -->

    <div class="page-break">
    <table align="center" class='t'>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            <img src="{{ public_path('img/KOP SMKN1KUTSEL.png') }}" width="652">
        </td>
    </tr>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Daftar Kegiatan Ekstrakurikuler {{$laporan->nama_ekskul}}      
        </td>
    </tr>
   
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Bulan {{$laporan->tgl_pelaksanaan_m1->translatedFormat('F Y')}}
        </td>
    </tr>
    </table>
    <br>
    <table align="center" width="640px" style="font-size:11pt">
    <tr>
        <td width="23%"><b>Kegiatan</b></td>
        <td width="2%">: </td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;">{{$laporan->kegiatan_ekskul_m1}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Tanggal Pelaksanaan</b></td>
        <td width="2%">:</td>
        @if ($laporan->tgl_pelaksanaan_m1 != '')
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"> {{$laporan->tgl_pelaksanaan_m1->translatedFormat('l, d F Y')}}</td>
        @else
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"> {{$laporan->tgl_pelaksanaan_m1}}</td>
        @endif
    </tr>
    <tr>
        <td width="23%"><b>Tempat Pelaksanaan</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{$laporan->tmp_pelaksanaan_m1}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Jumlah Peserta</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{$laporan->jml_peserta_m1}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Pembina</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{Auth::user()->name}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Foto Kegiatan</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"></td>
    </tr>
    @if ($laporan->foto_ekskul_m1 != '')
    <tr style='height:30px' class='r1'>
        <td colspan='12'>
            <br>
            <img src="{{ public_path(''.$laporan->foto_ekskul_m1) }}" width="350">
        </td>
    </tr>
    @else
    <tr style='height:30px' class='r1'>
        <td colspan='12'>
            <br>
            
        </td>
    </tr>
    @endif
    </table>
    </div>
    <!-- / end of page 1 -->

    @if ($laporan->jml_kegiatan == '2' || $laporan->jml_kegiatan == '3' || $laporan->jml_kegiatan == '4')
    <div class="page-break">
    <table id="page2_tb1" align="center" class='t'>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            <img src="{{ public_path('img/KOP SMKN1KUTSEL.png') }}" width="652">
        </td>
    </tr>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Daftar Kegiatan Ekstrakurikuler {{$laporan->nama_ekskul}}
        </td>
    </tr>
   
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Bulan {{$laporan->tgl_pelaksanaan_m1->translatedFormat('F Y')}}
        </td>
    </tr>
    </table>
    <br>

    <table id="page2_tb2" align="center" width="640px" style="font-size:11pt">
    <tr>
        <td width="23%"><b>Kegiatan</b></td>
        <td width="2%">: </td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;">{{$laporan->kegiatan_ekskul_m2}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Tanggal Pelaksanaan</b></td>
        <td width="2%">:</td>
        @if ($laporan->tgl_pelaksanaan_m2 != '')
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"> {{$laporan->tgl_pelaksanaan_m2->translatedFormat('l, d F Y')}}</td>
        @else
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"> {{$laporan->tgl_pelaksanaan_m2}}</td>
        @endif
    </tr>
    <tr>
        <td width="23%"><b>Tempat Pelaksanaan</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{$laporan->tmp_pelaksanaan_m2}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Jumlah Peserta</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{$laporan->jml_peserta_m2}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Pembina</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{Auth::user()->name}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Foto Kegiatan</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"></td>
    </tr>
    @if ($laporan->foto_ekskul_m2 != '')
    <tr style='height:30px' class='r1'>
        <td colspan='12'>
            <br>
            <img src="{{ public_path(''.$laporan->foto_ekskul_m2) }}" width="350">
        </td>
    </tr>
    @else
    <tr style='height:30px' class='r1'>
        <td colspan='12'>
            <br>
            
        </td>
    </tr>
    @endif
    </table>
    </div>
    @endif
    <!-- / end of page 2 -->

    @if ($laporan->jml_kegiatan == '3' || $laporan->jml_kegiatan == '4')
    <div class="page-break">
    <table id="page3_tb1" align="center" class='t'>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            <img src="{{ public_path('img/KOP SMKN1KUTSEL.png') }}" width="652">
        </td>
    </tr>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Daftar Kegiatan Ekstrakurikuler {{$laporan->nama_ekskul}}
        </td>
    </tr>
   
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Bulan {{$laporan->tgl_pelaksanaan_m1->translatedFormat('F Y')}}
        </td>
    </tr>
    </table>
    <br>

    <table id="page3_tb2" align="center" width="640px" style="font-size:11pt">
    <tr>
        <td width="23%"><b>Kegiatan</b></td>
        <td width="2%">: </td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;">{{$laporan->kegiatan_ekskul_m3}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Tanggal Pelaksanaan</b></td>
        <td width="2%">:</td>
        @if ($laporan->tgl_pelaksanaan_m3 != '')
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"> {{$laporan->tgl_pelaksanaan_m3->translatedFormat('l, d F Y')}}</td>
        @else
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"> {{$laporan->tgl_pelaksanaan_m3}}</td>
        @endif
    </tr>
    <tr>
        <td width="23%"><b>Tempat Pelaksanaan</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{$laporan->tmp_pelaksanaan_m3}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Jumlah Peserta</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{$laporan->jml_peserta_m3}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Pembina</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{Auth::user()->name}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Foto Kegiatan</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"></td>
    </tr>
    @if ($laporan->foto_ekskul_m3 != '')
    <tr style='height:30px' class='r1'>
        <td colspan='12'>
            <br>
            <img src="{{ public_path(''.$laporan->foto_ekskul_m3) }}" width="350">
        </td>
    </tr>
    @else
    <tr style='height:30px' class='r1'>
        <td colspan='12'>
            <br>
            
        </td>
    </tr>
    @endif
    </table>
    </div>
    @endif
    <!-- / end of page 3 -->

    @if ($laporan->jml_kegiatan == '4')
    <div class="page-break">
    <table id="page4_tb1" align="center" class='t'>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            <img src="{{ public_path('img/KOP SMKN1KUTSEL.png') }}" width="652">
        </td>
    </tr>
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Daftar Kegiatan Ekstrakurikuler {{$laporan->nama_ekskul}}
        </td>
    </tr>
   
    <tr style='height:18px' class='r1'>
        <td colspan='12'>
            Bulan {{$laporan->tgl_pelaksanaan_m1->translatedFormat('F Y')}}
        </td>
    </tr>
    </table>
    <br>

    <table id="page4_tb2" align="center" width="640px" style="font-size:11pt">
    <tr>
        <td width="23%"><b>Kegiatan</b></td>
        <td width="2%">: </td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;">{{$laporan->kegiatan_ekskul_m4}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Tanggal Pelaksanaan</b></td>
        <td width="2%">:</td>
        @if ($laporan->tgl_pelaksanaan_m4 != '')
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"> {{$laporan->tgl_pelaksanaan_m4->translatedFormat('l, d F Y')}}</td>
        @else
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"> {{$laporan->tgl_pelaksanaan_m4}}</td>
        @endif
    </tr>
    <tr>
        <td width="23%"><b>Tempat Pelaksanaan</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{$laporan->tmp_pelaksanaan_m4}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Jumlah Peserta</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{$laporan->jml_peserta_m4}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Pembina</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;">{{Auth::user()->name}}</td>
    </tr>
    <tr>
        <td width="23%"><b>Foto Kegiatan</b></td>
        <td width="2%">:</td>
        <td width="75%" style="padding-bottom: 10px;padding-top: 10px;word-break:break-all;"></td>
    </tr>
    @if ($laporan->foto_ekskul_m4 != '')
    <tr style='height:30px' class='r1'>
        <td colspan='12'>
            <br>
            <img src="{{ public_path(''.$laporan->foto_ekskul_m4) }}" width="350">
        </td>
    </tr>
    @else
    <tr style='height:30px' class='r1'>
        <td colspan='12'>
            <br>
            
        </td>
    </tr>
    @endif
    </table>
    </div>
    @endif
    <!-- / end of page 4 -->
</body>

</html>
