@extends('component.sidebar')
@section('css')
@endsection
@section('courier-active')
active
@endsection
@section('content')
<h1 class="h3 text-dark">Create New Data</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">Form</h6>
    </div>
    <div class="card-body">
        <form action="/courier" method="POST" enctype="multipart/form-data" name="data_courier" id="data_courier">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <h6 class="font-weight-bold text-primary">Nama Courier</h6>
                </label>
                <div class="col-sm-10">
                    <input name="courier" id="courier" type="text" class="form-control"
                        placeholder="Ex: JNE">
                    <span class="error text-danger">
                        <h6 id="courier_error"></h6>
                    </span>
                </div>
            </div>


            <div class="float-right">
                <a href="/courier" class="btn btn-info ">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <button type="submit" class="btn btn-success "> <i class="fas fa-paper-plane"></i> Simpan</button>
            </div>
        </form>


    </div>

</div>


@endsection
@section('javascript')
<script>
    document.getElementById("data_courier").onsubmit = function () {
        var errorCR = document.forms["data_courier"]["courier"].value;
        var submit = true;
        if (errorCR == null || errorCR == "") {
            msg_error = "*Silahkan masukan nama courier*";
            document.getElementById("courier_error").innerHTML = msg_error;
            submit = false;
        } else {
            document.getElementById("courier_error").innerHTML = ""
        }
        return submit;
    }

</script>

@endsection