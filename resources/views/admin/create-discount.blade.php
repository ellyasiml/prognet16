@extends('component.sidebar')
@section('css')
@endsection
@section('product-active')
active
@endsection
@section('content')
<h1 class="h3 text-dark">Tambah Discount</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">Tambah Data</h6>
    </div>
    <div class="card-body">
        <form action="/discount-store" method="POST" enctype="multipart/form-data" name="data_diskon"
            id="data_diskon">
            @csrf

            <input type="hidden" name="id" value="{{ $product->id}}">
            <input id="price" type="hidden" name="price"  value="{{ $product->price}}">
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <h6 class="font-weight-bold text-primary">Nama Barang</h6>
                </label>
                <div class="col-sm-10">
                    <input name="nama_barang" id="nama_barang" type="text" class="form-control"
                        placeholder="Nama Barang" value="{{$product->product_name}}">
                    <span class="error text-danger">
                        <h6 id="nama_barang_error"></h6>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <h6 class="font-weight-bold text-primary">Persentase Diskon</h6>
                </label>
                <div class="col-sm-10">
                    <input name="persentase" id="persentase" type="number" onblur="calculate()" class="form-control"
                        placeholder="Masukan nominal persentase (Dalam bentuk angka)" min="0">
                    <span class="error text-danger">
                        <h6 id="persentase_error"></h6>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <h6 class="font-weight-bold text-primary">Waktu Mulai</h6>
                </label>
                <div class="col-sm-10">
                    <input name="start" id="start" type="date" class="date form-control"
                        placeholder="Masukan nominal start (Dalam format tanggal)" min="0">
                    <span class="error text-danger">
                        <h6 id="start_error"></h6>
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <h6 class="font-weight-bold text-primary">Waktu Selesai</h6>
                </label>
                <div class="col-sm-10">
                    <input name="end" id="end" type="date" class="date form-control"
                        placeholder="Masukan nominal end (Dalam format tanggal)" min="0">
                    <span class="error text-danger">
                        <h6 id="end_error"></h6>
                    </span>
                </div>
            </div>
            <input id="harga_diskon" type="hidden" name="harga_diskon" />

            <script type="text/javascript">
                $('.date').datepicker({  
                format: 'mm-dd-yyyy'
                });  
            </script>

            <div class="float-right">
                <a href="/product" class="btn btn-info ">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary "> <i class="fas fa-pencil-alt"></i>Tambah</button>
            </div>
        </form>


    </div>

</div>


@endsection
@section('javascript')
<script>
    document.getElementById("data_diskon").onsubmit = function () {
        var errorNB = document.forms["data_diskon"]["nama_barang"].value;
        var errorHP = document.forms["data_diskon"]["persentase"].value;
        var errorTS = document.forms["data_diskon"]["start"].value;
        var errorTE = document.forms["data_diskon"]["end"].value;

        var submit = true;

        if (errorNB == null || errorNB == "") {
            msg_error = "*Silahkan masukan nama barang*";
            document.getElementById("nama_barang_error").innerHTML = msg_error;
            submit = false;
        } else {
            document.getElementById("nama_barang_error").innerHTML = ""
        }

        if (errorHP == null || errorHP == "") {
            msg_error = "*Silahkan masukan persentase diskon*";
            document.getElementById("persentase_error").innerHTML = msg_error;
            submit = false;
        } else {
            document.getElementById("persentase_error").innerHTML = ""
        }
        
        if (errorTS == null || errorTS == "") {
            msg_error = "*Silahkan masukan waktu mulai diskon*";
            document.getElementById("start_error").innerHTML = msg_error;
            submit = false;
        } else {
            document.getElementById("start_error").innerHTML = ""
        }

        if (errorTE == null || errorTE == "") {
            msg_error = "*Silahkan masukan waktu akhir diskon*";
            document.getElementById("end_error").innerHTML = msg_error;
            submit = false;
        } else {
            document.getElementById("end_error").innerHTML = ""
        }

        return submit;
    }

    calculate = function()
    {
        var persentase = document.getElementById('persentase').value;
        var price = document.getElementById('price').value; 
        // var persen = parseInt(persentase)/100;
        var hasil_diskon = parseInt(price) * parseInt(persentase)/100;
        document.getElementById('harga_diskon').value = parseInt(price) - parseInt(hasil_diskon);
        
    }

</script>

@endsection
