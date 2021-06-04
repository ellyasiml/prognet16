@extends('layouts.user-layout')
@section('css')
<style>
    /* Style untuk form ya */
    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    /* Style untuk masukan kolom */
    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* warna error untuk valdasi */
    input.invalid {
        background-color: #ffdddd;
    }

    /* menyembunyikan langkah" */
    .tab {
        display: none;
    }

    /* Lingkaran yang mengidentifikasi sebagai step */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Men-set active */
    .step.active {
        opacity: 1;
    }

    /* Mewarnai step ketika sudah diisi */
    .step.finish {
        background-color: #4CAF50;
    }

</style>
@endsection

@section('konten')
<!-- CONTENT =============================-->
<section class="item content">
    <div class="container toparea">
        <div class="underlined-title">
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
        <form name="regForm" id="regForm" action="{{ route('post.buynow') }}" method="post">
            @csrf
            <input type="hidden" name="id_produk" value="{{$product->id}}">
            <input type="hidden" id="berat" value="{{$product->weight}}">
            <input type="hidden" name="regency" id="regency">
            <input type="hidden" name="province" id="province">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="card-body">
                                @foreach ($product->RelasiProductImage as $gambar)
                                @if ($loop->iteration == 1)
                                <img src="{{asset('img/'.$gambar->image_name)}}" alt="" width="200" height="200"></span>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <p class="text-primary font-weight-bold h2 ">{{$product->product_name}}</p>
                            <p class="text-success h4">Rp.{{number_format($product->price)}}</p>
                            <hr style="border-top: thin solid #000000;width:50%; text-align:left;margin-left:0">
                            <p class="text-primary h4">Stock:{{$product->stock}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab pertama dari form -->
            <div class="tab">
                <strong>
                    <h4>Jumlah Yang ingin dibeli:</h4>
                </strong>
                <p>
                    <input type="number" min="1" max="{{$product->stock}}" oninput="this.className = ''"
                    name="jumlah_total" id="jumlah_total" onkeydown="return false" value="1">
                </p>
                <span class="text-danger">
                    <h6 id="error_jumlah_total"></h6>
                </span>
            </div>

            <!-- Tab kedua dari form -->
            <div class="tab">
                <strong>
                    <h4>Informasi Pengguna</h4>
                </strong>


                <h6>Nama:</h6>
                <p>
                    <input type="text" placeholder="Masukan nama anda" name="nama_penerima" id="nama_penerima"
                    oninput="this.className = ''" value="{{Auth::user()->name}}" >
                </p>
                <span class="text-danger">
                    <h6 class="error_nama_pengguna"></h6>
                </span>

                <h6>Email:</h6>
                <p>
                    <input type="email" placeholder="Masukan email anda" name="email_pengguna"
                    id="email_pengguna" oninput="this.className = ''" value="{{Auth::user()->email}}">
                </p>
                <span class="text-danger">
                    <h6 class="error_email_pengguna"></h6>
                </span>
            </div>


            <div class="tab"> 
                <strong>
                    <h4>Alamat</h4>
                </strong>
                <h6>Alamat Penerima:</h6>
                <p>
                    <input type="text" placeholder="Masukan alamat anda" name="alamat_pengguna"
                    id="alamat_pengguna" oninput="this.className = ''">
                </p>
                <span class="text-danger">
                    <h6 class="error_alamat_pengguna"></h6>
                </span>

                <h6>Provinsi:</h6>
                <p>
                    <select name="provinsi" class="form-control prov" id="provto" onchange="getcity(this.value, 'to')" required>

                    </select>
                </p>
                <span class="text-danger">
                    <h6 class="error_provinsi"></h6>
                </span>

                <h6>Kabupaten:</h6>
                <p>
                    <select name="kabupaten" class="form-control" id="cityto" required>

                    </select>
                </p>
                <span class="text-danger">
                    <h6 class="error_kabupaten"></h6>
                </span>

            </div>

            <div class="tab">
                Kurir
                <h6>Pilih kurir:</h6>
                <p>
                    <select class="form-control" id="kurir" name="kurir" required>
                        <option value="">--Select Here--</option>
                        @foreach($courier as $cou)
                        <option value="{{$cou->id}}">{{$cou->courier}}</option>
                        @endforeach
                    </select>
                </p>
                <span class="text-danger">
                    <h6 class="error_kabupaten"></h6>
                </span>
                <h6>Provinsi Pengirim:</h6>
                <p>
                    <select class="form-control prov" id="provfrom" onchange="getcity(this.value, 'from')" required>

                    </select>
                </p>
                <span class="text-danger">
                    <h6 class="error_provinsi"></h6>
                </span>

                <h6>Kabupaten Pengirim:</h6>
                <p>
                    <select class="form-control" id="cityfrom" required>

                    </select>
                </p>
                <span class="text-danger">
                    <h6 class="error_kabupaten"></h6>
                </span>

                <h6>Package:</h6>
                <select type="text" name="pack" id="pack" onchange="setongkir(this.value)" class="form-control">

                </select>

                <center>
                    <button class="btn btn-success" type="button" style="margin-top: 15px;" onclick="getongkir()">Lihat Package</button>
                </center>

                <h6>Ongkir:</h6>
                <input type="text" id="ongkir" name="ongkir" required readonly>

            </div>

            <div style="overflow:auto;">
                  <div style="float:right;">
                       
                    <button type="button" class="btn btn-primary" id="prevBtn"
                    onclick="nextPrev(-1)">Sebelumnya</button>
                       
                    <button type="button" class="btn btn-primary" id="nextBtn"
                    onclick="nextPrev(1)">Selanjutnya</button>
                     
                </div>
            </div>

            {{-- Indikator form  --}}
            <div style="text-align:center;margin-top:40px;">
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
            </div>


        </form>

    </div>
</section>
@endsection
@section('javascript')
<script>
    var currentTab = 0; 
    showTab(currentTab); 

    function showTab(tab) {
        var display = document.getElementsByClassName("tab");
        display[tab].style.display = "block";
        if (tab == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (tab == (display.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Selanjutnya";
        }
        fixStepIndicator(tab)
    }

    function nextPrev(tab) {
        var display = document.getElementsByClassName("tab");
        if (tab == 1 && !validateForm()) return false;
        display[currentTab].style.display = "none";
        currentTab = currentTab + tab;
        if (currentTab >= display.length) {
            document.getElementById("regForm").submit();
            return false;
        }
        showTab(currentTab);
    }

    function validateForm() {
        var x, y, i, className, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
                y[i].className += "invalid";
                valid = false;
            }
        }

        var errorNM = document.forms["regForm"]["jumlah_total"].value;


        if (errorNM == null || errorNM == "") {
            msg_error = "*Silahkan masukan jumlah";
            document.getElementById("error_jumlah_total").innerHTML = msg_error;
        } else {
            document.getElementById("error_jumlah_total").innerHTML = ""
        }


        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; 
    }

    function fixStepIndicator(tab) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[tab].className += " active";
    }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var ins = '<option value="">--Select Here--</option>'
        $.ajax({
            url: "/get/provinsi", 
            success: function(result){
                var hasil = JSON.parse(result);
                for (var i = 0; i < hasil.length; i++) {
                    ins += '<option value="'+hasil[i].province_id+'">'+hasil[i].province+'</option>'
                }
                $('.prov').html(ins);
                console.log(hasil);
            }
        });
    });

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

    function getongkir(){
        var ins = '<option value="">--Select Here--</option>';
        if ($('#provto').val() == "" || $('#cityto').val() == "" || $('#provfrom').val() == "" || $('#cityfrom').val() == "" || $('#kurir').val() == "") {
            alert('lengkapi lamat terlebih dahulu');
        }else{
            $('#province').val($('#provto').find(':selected').text());
            $('#regency').val($('#cityto').find(':selected').text());
            $.ajax({
                url: "/get/ongkir/"+$('#cityto').val()+'/'+$('#cityfrom').val()+'/'+$('#kurir').find(":selected").text()+'/'+$('#berat').val()*$('#jumlah_total').val(), 
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

    function setongkir(param){
        document.getElementById('ongkir').value = param;
    }

    function hitungberat(param){
        var baru = $('#berat').val() * param;
        $('#berat').val(baru);
    }
</script>
@endsection