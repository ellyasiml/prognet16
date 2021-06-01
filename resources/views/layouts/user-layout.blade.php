<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="">
    <link href="{{asset('template-user/css/bootstrap.min.css')}} " rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('template-user/css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
    @yield('css')
    <title>Toko Buku</title>
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
                        <a href="index.html" class="navbar-brand brand"> diBuku </a>
                    </div>
                    <div id="navbar-collapse-02" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="propClone"><a href="index.html">Home</a></li>
                            <li class="propClone"><a href="shop.html">Shop</a></li>
                            <li class="propClone"><a href="product.html">Product</a></li>
                            <li class="propClone"><a href="checkout.html">Checkout</a></li>
                            <li class="propClone"><a href="contact.html">Contact</a></li>
                            <li class="propClone">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/user/logout">Logout <i class="fa fa-sign-out"></i> </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="text-homeimage">
                            <div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">
                                diBuku
                            </div>
                            <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">
                                Toko Buku Online 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <!-- Content =============================-->
    @yield('konten')



    <!-- FOOTER =============================-->
    <div class="footer text-center">
        <div class="container">
            <div class="row">
                <p class="footernote">
                    Link Project Git Hub
                </p>
                <ul class="social-iconsfooter">
                    <li><a href="https://github.com/ellyasiml/prognet16"><i
                                class="fa fa-github"></i></a></li>
                </ul>
                <p>
                    &copy; 2021 Kelompok 16<br />
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
    @yield('javascript')

</body>

</html>