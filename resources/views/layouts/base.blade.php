<!DOCTYPE html>
<html lang="en">
<head>

    <title>{{$settings->name}} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

<div class="wrap">
    @include('layouts.flash_msg')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md d-flex align-items-center">
                <p class="mb-0 phone"><span class="mailus">{{__('web.Phone_no')}}:</span> <a href="#">{{$settings->phone}}</a> or <span class="mailus">email us:</span> <a href="#">{{$settings->email}}</a></p>
            </div>
            <div class="col-12 col-md d-flex justify-content-md-end">
                <p class="mb-0">Mon - Fri / 9:00-21:00, Sat - Sun / 10:00-20:00</p>

                <div class="social-media">
                    <select class=" changeLang p-1 ml-1">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="bd" {{ session()->get('locale') == 'bd' ? 'selected' : '' }}>Bangla</option>
                    </select>
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                    </p>


                </div>
            </div>

        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">{{$settings->name}} !</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">{{ __('web.Home') }}</a></li>
                <li class="nav-item"><a href="{{route('about_us')}}" class="nav-link">{{__('web.About')}}</a></li>
                <li class="nav-item"><a href="{{route('menu')}}" class="nav-link">{{__('web.Menu')}}</a></li>
                <li class="nav-item"><a href="{{route('blogs_list')}}" class="nav-link">{{__('web.Blog')}}</a></li>
                <div class="row" id="header-bar">
                    @include('layouts._header_cart')
                </div>


            </ul>

        </div>
    </div>
</nav>
<!-- END nav -->


@yield('content')


<footer class="ftco-footer ftco-no-pb ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{$settings->name}} </h2>
                    <p>{{__('web.OPEN_t')}}</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{__('web.OPEN_HOURS')}}</h2>
                    <ul class="list-unstyled open-hours">
                        <li class="d-flex"><span>Monday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex"><span>Tuesday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex"><span>Wednesday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex"><span>Thursday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex"><span>Friday</span><span>9:00 - 02:00</span></li>
                        <li class="d-flex"><span>Saturday</span><span>9:00 - 02:00</span></li>
                        <li class="d-flex"><span>Sunday</span><span> Closed</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{__('web.Newsletter')}}</h2>
                    <p>{{__('web.OPEN_t')}}</p>
                    <form action="{{route('newsletters.newsletter.store')}}" method="POST" class="subscribe-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control mb-2 text-center" name="email" id="email" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="form-control submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0 bg-primary py-3">
        <div class="row no-gutters">
            <div class="col-md-12 text-center">

            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@yield('js')
@yield('scripts')

<script type="text/javascript">

    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });

</script>

<script type="text/javascript">



    $(document).ready(function() {

        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });

    });
</script>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('js/google-map.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
