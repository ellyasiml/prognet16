@extends('component.admin-layout')
@section('css')

@endsection
@section('product-active')
active
@endsection

@section('content')
<div class="row">
    @foreach ($images as $image)
    <div class="col-12 col-md-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <img src="../img/{{$image->image_name}}" class="mx-auto d-block" alt="logo" width="200px" height="200px"
                    onerror="this.onerror=null;this.src='../img/default.png'" />
                <br>
            </div>
            <div class="card-footer">
                <center>
                    <form action="/gambar/{{$image->id}}/update" method="POST" enctype="multipart/form-data"
                        name="data_gambar" id="data_gambar">
                        @csrf
                        {{ method_field('PUT') }}
                        <input name="gambar_product" id="gambar_product" type="file" class=""
                            accept="image/x-png,image/jpeg" required>
                        <button type="submit" class="btn btn-primary "> <i class="fas fa-pencil-alt"></i>
                            Ubah</button>
                    </form>
                </center>

            </div>
        </div>

    </div>
    @endforeach
</div>
                <a href="{{url('product/'.$image->product_id)}}" class="btn btn-info ">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
@endsection