@extends('component.admin-layout')

@section('content')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light">Laporan Perbulan</div>

                <div class="card-body">
                    <form action="/laporan/perbulan" method="get" style="margin-bottom: 15px">
                        <div class="row">
                            <div class="col-lg-6" style="padding-left: 0; margin-bottom: 5px;">
                                <label>Bulan</label>
                                <select class="form-control" name="bulan">
                                    <option value="">--Select Here--</option>
                                    <option @if($bulan == 1){{'selected'}}@endif value="1">Januari</option>
                                    <option @if($bulan == 2){{'selected'}}@endif value="2">Februari</option>
                                    <option @if($bulan == 3){{'selected'}}@endif value="3">Maret</option>
                                    <option @if($bulan == 4){{'selected'}}@endif value="4">April</option>
                                    <option @if($bulan == 5){{'selected'}}@endif value="5">Mei</option>
                                    <option @if($bulan == 6){{'selected'}}@endif value="6">Juni</option>
                                    <option @if($bulan == 7){{'selected'}}@endif value="7">Juli</option>
                                    <option @if($bulan == 8){{'selected'}}@endif value="8">Agustus</option>
                                    <option @if($bulan == 9){{'selected'}}@endif value="9">September</option>
                                    <option @if($bulan == 10){{'selected'}}@endif value="10">Oktober</option>
                                    <option @if($bulan == 11){{'selected'}}@endif value="11">November</option>
                                    <option @if($bulan == 12){{'selected'}}@endif value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-lg-6" style="padding-right: 0; margin-bottom: 5px;">
                                <label>Tahun</label>
                                <input type="number" name="tahun" min="1990" class="form-control" value="{{$tahun}}">
                            </div>
                            <div class="col-lg-12" style="text-align: center; padding-top: 10px">
                                <input type="submit" class="btn btn-primary"  value="Lihat" />
                            </div>
                        </div>
                    </form>
                    <div>
                        <form action="/print/bulanan" method="get" style="margin-bottom: 15px">
                            <div class="row">
                                <input type="hidden" name="bulan" value="{{$bulan}}">
                                <input type="hidden" name="tahun" value="{{$tahun}}">
                                <div class="col-lg-12" style="text-align: center; padding-top: 10px">
                                    <input type="submit" class="btn btn-success"  value="Print" />
                                </div>
                            </div>
                        </form>
                    </div>
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
                    <div style="margin-top: 15px">
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var laporan = <?php echo $laporan ?>;
    var label = [], data=[];
    for (var i = 0; i < laporan.length; i++) {
        var tgl = laporan[i].tanggal.split("-");
        label.push(tgl[2]+'/'+tgl[1]+'/'+tgl[0]);
        data.push(laporan[i].jumlah);
    }
    var ctx = document.getElementById("myChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: label,
        datasets: [{
          label: "Earnings",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: data,
      }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
    }
},
scales: {
  xAxes: [{
    time: {
      unit: 'date'
  },
  gridLines: {
      display: false,
      drawBorder: false
  },
  ticks: {
      maxTicksLimit: 7
  }
}],
yAxes: [{
    ticks: {
      maxTicksLimit: 5,
      padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
        }
    },
    gridLines: {
      color: "rgb(234, 236, 244)",
      zeroLineColor: "rgb(234, 236, 244)",
      drawBorder: false,
      borderDash: [2],
      zeroLineBorderDash: [2]
  }
}],
},
legend: {
  display: false
},
tooltips: {
  backgroundColor: "rgb(255,255,255)",
  bodyFontColor: "#858796",
  titleMarginBottom: 10,
  titleFontColor: '#6e707e',
  titleFontSize: 14,
  borderColor: '#dddfeb',
  borderWidth: 1,
  xPadding: 15,
  yPadding: 15,
  displayColors: false,
  intersect: false,
  mode: 'index',
  caretPadding: 10,
  callbacks: {
    label: function(tooltipItem, chart) {
      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
      return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
  }
}
}
}
});
</script>
@endsection
