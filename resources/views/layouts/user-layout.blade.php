<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="">
    <link href="{{asset('template-user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('template-user/css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
    <title>TOKO BUKU </title>
</head>

<body>


    <!-- HEADER =============================-->
    <header class="item header margin-top-0">
        <div class="wrapper">
            <nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle"
                            type="button">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                        <a href="index.html" class="navbar-brand brand"> diBeli </a>
                    </div>
                    <div id="navbar-collapse-02" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="propClone"><a href="index.html">Home</a></li>
                            <li class="propClone"><a href="shop.html">Shop</a></li>
                            <li class="propClone"><a href="product.html">Product</a></li>
                            <li class="propClone"><a href="checkout.html">Checkout</a></li>
                            <li class="propClone"><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="text-homeimage">
                            <div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">
                                diBeli
                            </div>
                            <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">
                                <h1>TOKO ONLINE BUKU</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- STEPS =============================-->
    <div class="item content">
        <div class="container toparea">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="col editContent">
                        <span class="numberstep"><i class="fa fa-book"></i></span>
                        <h3 class="numbertext">Jenis Buku yang Lengkap</h3>
                        <p>
                            Menarwarkan bebagai jenis buku yang tentunya dapat dibilang cukup lengkap untuk sebuah toko
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
                                    <a href="#" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i>
                                        Purchase</a>
                                    <a href="#" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
                                </p>
                            </div>
                            @foreach ($product->RelasiProductImage as $gambar)
                                {{-- Melakukan Kondisi dimana hanya menampilkan 1 gambar saja dari product --}}
                                @if ($loop->iteration == 1)
                                <center><span class="maxproduct"><img src="../img/{{$gambar->image_name}}" alt=""
                                            width="200" height="200"></span></center>
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
            <a href="shop.html" class="homebrowseitems">Browse All Products
                <div class="homebrowseitemsicon">
                    <i class="fa fa-star fa-spin"></i>
                </div>
            </a>
        </div>
    </div>
    <br />





    <!-- FOOTER =============================-->
    <div class="footer text-center">
        <div class="container">
            <div class="row">
                <p class="footernote">
                    Connect with diBeli
                </p>
                <ul class="social-iconsfooter">
                    <li><a href="#"><i class="fa fa-phone"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
                <p>
                    &copy; 2017 Your Website Name<br />
                    Scorilo - Free template by <a href="https://www.wowthemes.net/">WowThemesNet</a>
                </p>
            </div>
        </div>
    </div>

    <!-- SCRIPTS =============================-->
    <script src="{{asset('template-user/js/jquery-.js')}}"></script>
    <script src="{{asset('template-user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template-user/js/anim.js')}}"></script>
    <script>
        //----HOVER CAPTION---//	  
        jQuery(document).ready(function ($) {
            $('.fadeshop').hover(
                function () {
                    $(this).find('.captionshop').fadeIn(150);
                },
                function () {
                    $(this).find('.captionshop').fadeOut(150);
                }
            );
        });

    </script>

</body>

</html>
