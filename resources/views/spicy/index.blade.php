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
                            <span class="subheading">{{$settings->name}}  Restaurant</h2></span>
                            <h1>{{__('web.Cooking_Since')}}</h1>
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
                            <span class="subheading">{{$settings->name}}  Restaurant</h2></span>
                            <h1>{{__('web.Best_Quality')}}</h1>
                            <span class="subheading-2 sub">Food</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-sm-4 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
                <form action="{{route('book_tables.book_table.store')}}" class="appointment-form" method="post">
                    @csrf
                    <h3 class="mb-3">{{__('web.Book_table')}}</h3>
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
                                    <input type="hidden" name="is_approved" id="is_approved" value="0">
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
                                <button type="submit" class="btn btn-white py-3 px-4">
                                    {{__('web.Book_table')}}
                                </button>
{{--                                <input type="submit" value="Book Your Table Now" >--}}
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
                                <h2 class="mb-4">Welcome to {{$settings->name}} </h2>
                            </div>
                        </div>
                        <div class="pl-lg-3 ml-md-5">
                            <p>{{__('web.tag_line')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span>{{__('web.Book_table')}}</span>
                <h2>{{__('web.Private_Dinners_&_Happy_Hours')}}</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <br>
                <h2 class="mb-4">{{__('web.Our_Menu')}}</h2>
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
                                    <span class="price">{{$food->price}}</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                            <p class="btn-holder"><a href="javascript:void(0);"
                                                     data-id="{{ $food->id }}" class="btn btn-warning
                                  btn-block text-center add-to-cart" role="button">{{__('web.Add_to_cart')}}</a>
                                <i class="fa fa-circle-o-notch fa-spin btn-loading"
                                   style="font-size:24px; display: none"></i>
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endforeach

                    <span class="flat " style="left: 0;"></span>
                    <span class="flat flaticon-chicken" style="right: 0;"></span>
                </div>
            </div>
            @endforeach


        </div>
    </div>

</section>




<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-4">{{__('web.Recent_Blog')}}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                        </a>
                        <div class="text px-4 pt-3 pb-4">
                            <div class="meta">
                                <div><a href="#">August 3, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">{{$blog->title}}</a></h3>
                            <p class="clearfix">
                                <a href="{{route('read_blog',$blog->id)}}" class="float-left read btn btn-primary">{{__('web.Read_more')}}</a>
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
                <h2>{{__('web.We_Make_Delicious_&_Nutritious_Food')}}</h2>
                <a href="#" class="btn btn-white btn-outline-white">{{__('web.Book_table')}}</a>
            </div>
        </div>
    </div>
</section>
@endsection
