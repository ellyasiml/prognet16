@extends('layouts.user-layout')
@section('konten')
<!-- CONTENT =============================-->
<section class="item content">
        <div class="container toparea">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">Semua Produk</h1>
                </div>
                <div class="wow-hr type_short">
                    <span class="wow-hr-h">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="productbox">
                        <div class="fadeshop">
                            <div class="captionshop text-center" style="display: none;">
                                <h3>{{$product->product_name}}</h3>
                                <p class="">
                                    {{Str::limit($product->description, 80, $end='...')}}
                                </p>
                                <p>
                                    <a href="/user/transaksi-langsung/{{$product->id}}" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i>
                                        Purchase</a>
                                    <a href="/user/detail/{{$product->id}}" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
                                </p>
                            </div>
                            @foreach ($product->RelasiProductImage as $gambar)
                            {{-- Melakukan Kondisi dimana hanya menampilkan 1 gambar saja dari product --}}
                            @if ($loop->iteration == 1)
                            <center><span class="maxproduct"><img src="../img/{{$gambar->image_name}}" alt=""
                                        width="200" height="300"></span></center>
                            @endif
                            @endforeach

                        </div>
                        <div class="product-details">
                            <h1>{{$product->product_name}}</h1>
                            </a>
                            <span class="price">
                                <span class="edd_price">Rp.{{number_format($product->price)}}</span>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
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

@endsection