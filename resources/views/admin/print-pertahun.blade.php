<!DOCTYPE html>
<html>
<head>
    <title>Laporan Tahunan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body onload="window.print()">
    <h3 style="text-align: center; padding-top: 15px; padding-bottom: 15px">Laporan Transaksi Tahun {{$tahun}}</h3>
    <table class="table table-striped" id="myTable">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Bulan</th>
                <th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @if(sizeof($laporan) > 0)
            @foreach($laporan as $lap)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">
                    @if($lap->bulan == 1)
                    Januari
                    @elseif($lap->bulan == 2)
                    Februari
                    @elseif($lap->bulan == 3)
                    Maret
                    @elseif($lap->bulan == 4)
                    April
                    @elseif($lap->bulan == 5)
                    Mei
                    @elseif($lap->bulan == 6)
                    Juni
                    @elseif($lap->bulan == 7)
                    Juli
                    @elseif($lap->bulan == 8)
                    Agustus
                    @elseif($lap->bulan == 9)
                    September
                    @elseif($lap->bulan == 10)
                    Oktober
                    @elseif($lap->bulan == 11)
                    November
                    @elseif($lap->bulan == 12)
                    Desember
                    @endif
                </td>
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