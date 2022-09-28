@extends('layouts.base')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">{{__('web.Specialties')}}</span>
                    <br>
                    <h2 class="mb-4">{{__('web.Menu')}}</h2>
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

    php artisan make:mail TableBookRequestMail --markdown=emails.table_book_request_mail

    <section class="ftco-section ftco-wrap-about bg-primary ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-12 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
                    <form action="#" class="appointment-form">
                        <h3 class="mb-3">Book your Table</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                        <input type="text" class="form-control book_date" placeholder="Check-In">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="fa fa-clock-o"></span></div>
                                        <input type="text" class="form-control book_time" placeholder="Time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Guest</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" value="Book Your Table Now" class="btn btn-white py-3 px-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

