@extends('layouts.user-layout')
@section('konten')
<!-- CONTENT =============================-->
<section class="item content">
    <div class="container toparea">
        <div class="underlined-title">
            <div class="editContent">
                <h1 class="text-center latestitems">Transaksi Anda</h1>
            </div>
            <div class="wow-hr type_short">
                <span class="wow-hr-h">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </span>
            </div>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('gagal'))
        <div class="alert alert-danger">
            {{Session::get('gagal')}}
        </div>
        @endif
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-lg-12" style="text-align: center;">
                <button class="btn btn-primary tombol" onclick="getdata(<?php echo Auth::user()->id; ?>, 'unverified')">Unverif</button>
                <button class="btn btn-primary tombol" onclick="getdata(<?php echo Auth::user()->id; ?>, 'verified')">Verif</button>
                <button class="btn btn-primary tombol" onclick="getdata(<?php echo Auth::user()->id; ?>, 'delivered')">Delivered</button>
                <button class="btn btn-primary tombol" onclick="getdata(<?php echo Auth::user()->id; ?>, 'success')">Success</button>
                <button class="btn btn-primary tombol" onclick="getdata(<?php echo Auth::user()->id; ?>, 'expired')">Expired</button>
                <button class="btn btn-primary tombol" onclick="getdata(<?php echo Auth::user()->id; ?>, 'canceled')">Canceled</button>
            </div>
            <div class="col-lg-12" id="konten" style="padding-top: 10px; text-align: center;">                        
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Upload Bukti</h5>
            </div>
            <form action="{{ route('upload.bukti') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="uploadid">
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="bukti" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Review Barang</h5>
            </div>
            <form action="{{ route('beri.rating') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" id="productid">
                <div class="modal-body">
                    <input type="hidden" name="id" id="idbarang">
                    <div class="form-group">
                        <label>Rating</label>
                        <input class="form-control" type="number" min="1" max="5" step="0.01" name="rate" required>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control">Masukkan ulasan anda</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama Produk</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Harga</th>
                        </tr>
                    </thead>
                    <tbody id="detail"></tbody>
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
                    <h1 class="callactiontitle"> Promote Items Area Give Discount to Buyers <span
                        class="callactionbutton"><i class="fa fa-gift"></i> WOW24TH</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        document.getElementById('konten').innerHTML = 'Silahkan klik salah satu tombol status transaksi';
    });

    var stat = '';

    function hitungmundur(param){
        var tgl = new Date(param).getTime();
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = tgl - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // If the count down is finished, write some text
        if (distance < 0) {
            return "EXPIRED";
        }else{
            return days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";  
        }
    }

    function getdata(param,status){
        stat = status;
        document.getElementById('konten').innerHTML = 'Sedang mengambil data harap tunggu';
        $.ajax({
            url: "/data/trans/"+status+"/"+param, 
            success: function(result){
                var kolom = '';
                if (status == 'unverified') {
                    kolom = '<th style="text-align:center">Sisa Waktu</th>';
                }
                var ins = '<table class="table table-striped">'+
                '<thead>'+
                '<tr>'+
                '<th style="text-align:center">No</th>'+
                kolom+
                '<th style="text-align:center">Sub Total</th>'+
                '<th style="text-align:center">Ongkir</th>'+
                '<th style="text-align:center">Total</th>'+
                '<th style="text-align:center">Bukti</th>'+
                '<th style="text-align:center">Action</th>'+
                '</tr>'+
                '</thead>'+
                '<tbody>';
                var hasil = JSON.parse(result);
                console.log(hasil);
                if (hasil.length > 0) {
                    for (var i = 0; i < hasil.length; i++) {
                        var upload = ''; var cancel = ''; var col = ''; var tombol='';
                        var sisa = hitungmundur(hasil[i].timeout); 
                        if (hasil[i].status == 'unverified' && hasil[i].proof_of_payment == null) {
                            upload = '<button class="btn btn-success" style="margin-bottom:5px" onclick="showmodal('+hasil[i].id+')">Upload Bukti</button>';
                            cancel = '<a class="btn btn-danger" href="/cancel/transaksi/'+hasil[i].id+'">Cancel</a>';
                            col = '<td>'+ sisa +'</td>'; 
                        }else if(hasil[i].status == 'delivered'){
                            upload = '<a class="btn btn-success" href="/terima/barang/'+hasil[i].id+'">Terima Barang</a>';
                        }else if(hasil[i].status == 'success'){
                            tombol = '<button class="btn btn-success" onclick="review('+hasil[i].id+')">Review</button>';
                        }
                        var tanggal = new Date(hasil[i].timeout);
                        ins += '<tr style="text-align:center">'+
                        '<td>'+(i+1)+'</td>'+
                        col+
                        '<td>Rp. '+hasil[i].sub_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td>'+
                        '<td>Rp. '+hasil[i].shipping_cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td>'+
                        '<td>Rp. '+hasil[i].total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td>'+                        
                        '<td><a target="_blank" href="/bukti/'+hasil[i].proof_of_payment+'">Lihat</a></td>'+
                        '<td style="display:flex; flex-direction:column"><button class="btn btn-info" style="color:#fff;margin-bottom:5px" onclick="getdetail('+hasil[i].id+')">Lihat Detail</button>'+upload+cancel+tombol+'</td>'+
                        '</tr>';
                    }
                    ins += '</tbody><table>';
                    document.getElementById('konten').innerHTML = ins;
                }else{
                    document.getElementById('konten').innerHTML = 'Tidak ada data';
                }
            }
        });
    }

    function showmodal(param){
        $('#uploadid').val(param);
        $('#exampleModal').modal('show');
    }

    function getdetail(param){
        $('#modaldetail').modal('show');
        $.ajax({
            url: "/data/detail/"+param, 
            success: function(result){
                var ins = '';
                var hasil = JSON.parse(result);
                console.log(hasil);
                if (hasil.length > 0) {
                    for (var i = 0; i < hasil.length; i++) {
                        ins += '<tr style="text-align:center">'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+hasil[i].product_name+'</td>'+
                        '<td>'+hasil[i].qty+'</td>'+
                        '<td>Rp. '+hasil[i].selling_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td>'+
                        '</tr>';
                    }
                    document.getElementById('detail').innerHTML = ins;
                }else{
                    document.getElementById('detail').innerHTML = 'Tidak ada data';
                }
            }
        });
    }

    function review(param){
        $('#idtrans').val(param);
        $('#productid').val(param);
        $('#modaldetail').modal('hide');
        $('#modalreview').modal('show');
    }
</script>
@endsection