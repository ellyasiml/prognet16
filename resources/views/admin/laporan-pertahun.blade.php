@extends('component.admin-layout')

@section('content')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light">Laporan Pertahun</div>

                <div class="card-body">
                    <form action="/laporan/pertahun" method="get" style="margin-bottom: 15px">
                        <div class="row">
                            <div class="col-lg-12" style="padding-right: 0; margin-bottom: 5px;">
                                <label>Tahun</label>
                                <input type="number" name="tahun" min="1990" class="form-control" value="{{$tahun}}">
                            </div>
                            <div class="col-lg-12" style="text-align: center; padding-top: 10px">
                                <input type="submit" class="btn btn-primary"  value="Lihat" />
                            </div>
                        </div>
                    </form>
                    <form action="/print/tahunan" method="get" style="margin-bottom: 15px">
                        <input type="hidden" name="tahun" min="1990" class="form-control" value="{{$tahun}}">
                        <input type="submit" class="btn btn-success"  value="Print" />
                    </form>
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
    function getbulan(param){
        if (param == 1) {
            return "Januari"
        }else if (param == 2) {
            return "Februari"
        }else if (param == 3) {
            return "Maret"
        }else if (param == 4) {
            return "April"
        }else if (param == 5) {
            return "Mei"
        }else if (param == 6) {
            return "Juni"
        }else if (param == 7) {
            return "Juli"
        }else if (param == 8) {
            return "Agustus"
        }else if (param == 9) {
            return "September"
        }else if (param == 10) {
            return "Oktober"
        }else if (param == 11) {
            return "November"
        }else if (param == 12) {
            return "Desember"
        }
    }

    var laporan = <?php echo $laporan ?>;
    var label = [], data=[];
    for (var i = 0; i < laporan.length; i++) {
        label.push(getbulan(laporan[i].bulan));
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
