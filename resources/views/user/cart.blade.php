@extends('layouts.user-layout')
@section('konten')
<!-- CONTENT =============================-->
<section class="item content">
    <div class="container toparea">
        <div class="underlined-title">
            <div class="editContent">
                <h1 class="text-center latestitems">Keranjang Anda</h1>
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(sizeof($product)>0)
        @foreach ($product as $p)
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="card-body">
                            <center>
                                @foreach ($p->produk[0]->RelasiProductImage as $gambar)
                                @if ($loop->iteration == 1)
                                <img src="{{asset('img/'.$gambar->image_name)}}" alt="" width="200" height="200"></span>
                                @endif
                                @endforeach
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-4">
                @foreach($p->produk as $pro)
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <p class="text-primary font-weight-bold h2 ">{{$pro->product_name}}</p>
                        <p class="text-success h4">Rp.{{number_format($pro->price)}}</p>
                        <hr style="border-top: thin solid #000000;width:100%; text-align:left;margin-left:0; margin-top: 13px; margin-bottom: 13px;">

                        <p>Deskripsi : {{$pro->description}}<br>Berat : {{$pro->weight}} gram<br>Jumlah : {{$p->qty}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="pull-right">
                    <button data-toggle="modal" data-target="#modalku{{$p->id}}" class="btn btn-success"><i class="fa fa-edit"></i>Ubah</button>
                    <div class="modal fade" id="modalku{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="exampleModalLabel">Form Jumlah</h5>
                                </div>
                                <form action="{{ route('ubahjumlah') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{$p->id}}">
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="number" name="qty" class="form-control" value="{{$p->qty}}" min="1" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-danger" href="{{ route('hapuscart', ['id' => $p->id]) }}" onclick="return confirm('Yakin melanjutkan hapus data ? ')"><i class="fa fa-trash"></i>Hapus</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-danger">Ups Keranjang Anda Masih Kosong</div>
        @endif
        <div class="col-lg-12" style="text-align: center; padding-top: 20px;">
            @if(sizeof($product)>0)
            <button class="btn btn-primary" data-toggle="modal" data-target="#checkout" onclick="hitung()">Checkout</button>
            <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Checkout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{ route('post.checkout')}}">
                            @csrf
                            <input type="hidden" name="regency" id="regency">
                            <input type="hidden" name="province" id="province">
                            <div class="modal-body">
                                <div class="form-group" style="text-align: left;">
                                    <label>Berat Total</label>
                                    <input type="text" id="berat" name="berat" class="form-control" readonly>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat" required>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <label>Provinsi Penerima</label>
                                    <select class="form-control prov" name="provto" id="provto" onchange="getcity(this.value, 'to')" required></select>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <label>Kota / Kabupaten Penerima</label>
                                    <select class="form-control" name="cityto" id="cityto" required></select>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <label>Provinsi Pengirim</label>
                                    <select class="form-control prov" name="provfrom" id="provfrom" onchange="getcity(this.value, 'from')" required></select>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <label>Kota / Kabupaten Pengirim</label>
                                    <select class="form-control" name="cityfrom" id="cityfrom" required></select>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <label>Kurir</label>
                                    <select class="form-control" id="kurir" name="kurir" required>
                                        <option value="">--Select Here--</option>
                                        @foreach($courier as $cou)
                                        <option value="{{$cou->id}}">{{$cou->courier}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <center>
                                    <button type="button" class="btn btn-success" onclick="getpackage()">Get Package</button>
                                </center>
                                <div class="form-group" style="text-align: left;">
                                    <label>Package</label>
                                    <select class="form-control" id="pack" onchange="setongkir(this.value)" required></select>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <label>Ongkir</label>
                                    <input type="text" name="ongkir" id="ongkir" class="form-control" readonly required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
</section>

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
        var ins = '<option value="">--Select Here--</option>'
        $.ajax({
            url: "/get/provinsi", 
            success: function(result){
                var hasil = JSON.parse(result);
                for (var i = 0; i < hasil.length; i++) {
                    ins += '<option value="'+hasil[i].province_id+'">'+hasil[i].province+'</option>';
                }
                $('.prov').html(ins);
                console.log(hasil);
            }
        });
    });

    function getpackage(){
        var ins = '<option value="">--Select Here--</option>';
        if ($('#provto').val() == "" || $('#cityto').val() == "" || $('#provfrom').val() == "" || $('#cityfrom').val() == "" || $('#kurir').val() == "") {
            alert('lengkapi alamat terlebih dahulu');
        }else{
            $('#province').val($('#provto').find(':selected').text());
            $('#regency').val($('#cityto').find(':selected').text());
            $.ajax({
                url: "/get/ongkir/"+$('#cityto').val()+'/'+$('#cityfrom').val()+'/'+$('#kurir').find(":selected").text()+'/'+$('#berat').val(), 
                success: function(result){
                    var hasil = JSON.parse(result);
                    for (var i = 0; i < hasil[0].costs.length; i++) {
                        ins += '<option value="'+hasil[0].costs[i].cost[0].value+'">'+hasil[0].costs[i].service+'</option>'
                    }
                    $('#pack').html(ins);
                    console.log(hasil);
                }
            });
        }
    }

    function hitung(){
        var berat = 0;
        $.ajax({
            url: "/get/berat/"+<?php echo Auth::user()->id; ?>, 
            success: function(result){
                var hasil = JSON.parse(result);
                for (var i = 0; i < hasil.length; i++) {
                    berat += hasil[i].qty * hasil[i].weight
                }
                $('#berat').val(berat);
                console.log(hasil);
            }
        });
    }

    function getcity(param, destiny){
        var ins = '<option value="">--Select Here--</option>'
        $.ajax({
            url: "/get/city/"+param, 
            success: function(result){
                var hasil = JSON.parse(result);
                for (var i = 0; i < hasil.length; i++) {
                    ins += '<option value="'+hasil[i].city_id+'">'+hasil[i].city_name+'</option>'
                }
                if (destiny == 'to') {
                    $('#cityto').html(ins)
                }else if (destiny == 'from'){
                    $('#cityfrom').html(ins)
                }
                console.log(hasil);
            }
        });
    }

    function setongkir(param){
        document.getElementById('ongkir').value = param;
    }
</script>
@endsection