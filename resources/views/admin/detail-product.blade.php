@extends('component.admin-layout')
@section('css')

@endsection
@section('product-active')
active
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-md-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($product->RelasiProductImage as $gambar)
                        <div class="carousel-item {{$loop->iteration==1 ? 'active' : ''}}">
                            <img src="../img/{{$gambar->image_name}}" class=" mx-auto d-block" alt="logo" width="200px"
                                height="200px" onerror="this.onerror=null;this.src='../img/default.png'" />
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev text-dark" href="#carouselExampleIndicators" role="button"
                        data-slide="prev">
                        <i class="fas fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next text-dark" href="#carouselExampleIndicators" role="button"
                        data-slide="next">
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="card-footer">
                <center><a href="/gambar/{{$product->id}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i>
                        Ubah Gambar</a></center>
            </div>
        </div>

    </div>
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-body">
                <p> <strong>Nama Product:</strong> {{$product->product_name}}</p>
                <p> <strong>Harga Product: </strong> {{$product->price}}</p>
                <p> <strong>Deskripsi :</strong> {{$product->description}}</p>
                <p> <strong>Stock : </strong> {{$product->stock}}</p>
                <p> <strong>Weight : </strong> {{$product->weight}}</p>
                <p> <strong>Kategori :</strong>
                    @foreach ($product->RelasiProductCategory as $productCategory)
                    {{$productCategory->category_name}}, 
                    @endforeach
                </p>
                <div class="float-right">
                    <a href="/product" class="btn btn-info ">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <a href="/product/{{$product->id}}/edit" class="btn btn-primary">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
