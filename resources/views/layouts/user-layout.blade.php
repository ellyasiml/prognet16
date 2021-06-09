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
                        <a href="/user" class="navbar-brand brand"> diBuku </a>
                    </div>
                    <div id="navbar-collapse-02" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="propClone"><a href="/user">Home</a></li>
                            <li class="propClone"><a href="/user/show">Product</a></li>
                            @if(Auth::check())
                            <li class="propClone"><a href="/user/cart/{{Auth::user()->id}}">Cart</a></li>
                            <li class="propClone"><a href="/user/transaksi/{{Auth::user()->id}}">Transaksi</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Notifications
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @php $user_unRead = \App\UserNotifications::where('notifiable_id', Auth::user()->id)->where('read_at', NULL)->orderBy('created_at','desc')->count(); @endphp
                                    @php $user_notifikasi = \App\UserNotifications::where('notifiable_id', Auth::user()->id)->where('read_at', NULL)->orderBy('created_at','desc')->get(); @endphp
                                    @forelse ($user_notifikasi as $notifikasi)
                                         @php $notif = json_decode($notifikasi->data); @endphp
                                            <a href="{{-- route('user.notification', $notifikasi->id) --}}" class="dropdown-item btnunNotif" data-num=""><small>[{{ $notif->nama }}] {{ $notif->message }}<br></small></a>
                                    @empty
                                            <a href="#" class="dropdown-item">
                                            &nbsp;<small>Tidak ada notifikasi<br></small>
                                            </a>
                                    @endforelse
                                  <!--<a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Something else here</a>-->
                                </div>
                              </li>
                            @endif
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