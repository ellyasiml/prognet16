<!DOCTYPE html>
<html>
<head>
    <title>Laporan Bulanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body onload="window.print()">
    <h3 style="text-align: center; padding-top: 15px; padding-bottom: 15px">Laporan Transaksi Bulan {{$bulan}} Tahun {{$tahun}}</h3>
    <table class="table table-striped" id="myTable">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @if(sizeof($laporan) > 0)
            @foreach($laporan as $lap)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">{{date('d-m-Y', strtotime($lap->tanggal))}}</td>
                <td class="text-center">{{$lap->jumlah}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3" style="text-align: center;">Tidak ada data</td>
            </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
