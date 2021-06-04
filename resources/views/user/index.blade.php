@extends('layouts.user-layout')
@section('konten')
@if(Session::has('success'))
<script type="text/javascript">
    alert('{{Session::get("success")}}');
</script>
@endif
 <!-- STEPS =============================-->
 <div class="item content">
        <div class="container toparea">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="col editContent">
                        <span class="numberstep"><i class="fa fa-book"></i></span>
                        <h3 class="numbertext">Jenis Buku yang Lengkap</h3>
                        <p>
                            Menawarkan bebagai jenis buku yang tentunya dapat dibilang cukup lengkap untuk sebuah toko
                            buku online.
                        </p>
                    </div>
                    <!-- /.col-md-4 -->
                </div>
                <!-- /.col-md-4 col -->
                <div class="col-md-4 editContent">
                    <div class="col">
                        <span class="numberstep"><i class="fa fa-gift"></i></span>
                        <h3 class="numbertext">Banyak Tawaran Menarik</h3>
                        <p>
                            Terdapat berbagai banyak tawaran menarik yang tentunya bisa membuat anda senang
                        </p>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.col-md-4 col -->
                <div class="col-md-4 editContent">
                    <div class="col">
                        <span class="numberstep"><i class="fa fa-shopping-cart"></i></span>
                        <h3 class="numbertext">Transaksi yang Mudah</h3>
                        <p>
                            Dengan sistem toko online, anda dapat mencari buku yang anda inginkan dan membelinya dengan mudah 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- LATEST ITEMS =============================-->
    <section class="item content">
        <div class="container">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">Produk Terbaru</h1>
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
                                    <a href="/user/transaksi-langsung/{{$product->id}}" class="learn-more detailslearn"><i class="fa fa-dollar"></i>
                                        Purchase</a>
                                    <a href="/user/detail/{{$product->id}}" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
                                    <a href="/add/cart/{{$product->id}}" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </p>
                            </div>
                            @foreach ($product->RelasiProductImage as $gambar)
                                {{-- Melakukan Kondisi dimana hanya menampilkan 1 gambar saja dari product --}}
                                @if ($loop->iteration == 1)
                                <center><span class="maxproduct"><img src="../img/{{$gambar->image_name}}" alt=""
                                            width="200" height="250"></span></center>
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

                <!-- /.productbox -->
            </div>
        </div>
        </div>
    </section>


    <!-- BUTTON =============================-->
    <div class="item content">
        <div class="container text-center">
            <a href="/user/show" class="homebrowseitems">Lihat Semua Produk
                <div class="homebrowseitemsicon">
                    <i class="fa fa-star fa-spin"></i>
                </div>
            </a>
        </div>
    </div>
    <br />

@endsection

   