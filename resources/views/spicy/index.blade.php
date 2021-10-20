@extends('layouts.base')
@section('content')


<section class="hero-wrap">
    <div class="home-slider owl-carousel js-fullheight">
        <div class="slider-item js-fullheight" style="background-image:url(images/bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 mt-5 text-center">
                            <span class="subheading">Spicy ! Restaurant</h2></span>
                            <h1>Cooking Since</h1>
                            <span class="subheading-2">1958</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight" style="background-image:url(images/bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 mt-5 text-center">
                            <span class="subheading">Spicy ! Restaurant</h2></span>
                            <h1>Best Quality</h1>
                            <span class="subheading-2 sub">Food</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt" id="reservation">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-sm-4 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
                <form action="{{route('book_table')}}" class="appointment-form" method="post">
                    @csrf
                    <h3 class="mb-3">Book your Table</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="name" name="name" required class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" required class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="phone" required class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="fa fa-calendar"></span></div>
                                    <input type="text" name="date"  required class="form-control book_date" placeholder="Check-In">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="fa fa-clock-o"></span></div>
                                    <input type="text" name="time" required class="form-control book_time" placeholder="Time">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                        <select name="guest" id="guest" class="form-control" required>
                                            <option value="">Select Number Of Guest</option>
                                            <option style="color: black" value="1">1</option>
                                            <option style="color: black" value="2">2</option>
                                            <option style="color: black" value="3">3</option>
                                            <option  style="color: black" value="4">4</option>
                                            <option style="color: black" value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Book Your Table Now" class="btn btn-white py-3 px-4">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-8 wrap-about py-5 ftco-animate img" style="background-image: ;">
                <div class="row pb-5 pb-md-0">
                    <div class="col-md-12 col-lg-7">
                        <div class="heading-section mt-5 mb-4">
                            <div class="pl-lg-3 ml-md-5">
                                <span class="subheading">About</span>
                                <h2 class="mb-4">Welcome to Spicy !</h2>
                            </div>
                        </div>
                        <div class="pl-lg-3 ml-md-5">
                            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-intro" >
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span>Now Booking</span>
                <h2>Private Dinners &amp; Happy Hours</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Specialties</span>
                <br>
                <h2 class="mb-4">Our Menu</h2>
            </div>
        </div>
        <div class="row">
            @foreach($foodmenu->chunk(1) as $category)

            <div class="col-md-6 col-lg-4">
                <div class="menu-wrap">
                    <div class="heading-menu text-center ftco-animate">
                        @foreach($category as $s)
                        <h3>{{$s[0]->category->name}}</h3>
                        @endforeach
                    </div>
                    @foreach($category as $s)
                    @foreach($s as $food)
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>{{$food->name}}</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">${{$food->price}}</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                            <p class="btn-holder"><a href="javascript:void(0);"
                                                     data-id="{{ $food->id }}" class="btn btn-warning
                                  btn-block text-center add-to-cart" role="button">Add to cart</a>
                                <i class="fa fa-circle-o-notch fa-spin btn-loading"
                                   style="font-size:24px; display: none"></i>
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endforeach

                    <span class="flat flaticon-bread" style="left: 0;"></span>
                    <span class="flat flaticon-chicken" style="right: 0;"></span>
                </div>
            </div>
            @endforeach


        </div>
    </div>

</section>



<hr>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Blog</span>
                <h2 class="mb-4">Recent Blog</h2>
            </div>
        </div>
        <div class="row">

            @foreach($blogs as $blog)
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
{{--                        <a href="blog-single.html"  style="background-image: url();">--}}
{{--                        </a>--}}
                        <img src="storage/{{$blog->image}}"  class="block-20" alt="image">
                        <div class="text px-4 pt-3 pb-4">
                            <div class="meta">
                                <div><a href="#">{{$blog->created_at->format('D-M-Y h:i')}}</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">{{$blog->title}}</a></h3>
                            <p class="clearfix">
                                <a href="{{route('read.blog',$blog->id)}}" class="float-left read btn btn-primary">Read more</a>
                                <a href="#" class="float-right meta-chat"><span class="fa fa-comment"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-intro bg-primary">
    <div class="container py-5">
        <div class="row py-2">
            <div class="col-md-12 text-center">
                <h2>We Make Delicious &amp; Nutritious Food</h2>
                <a href="#reservation" class="btn btn-white btn-outline-white">Book A Table Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
