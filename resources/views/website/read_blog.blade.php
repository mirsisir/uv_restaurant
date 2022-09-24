@extends('layouts.base')
@section('title', 'Cart')

@section('content')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('.././images/bg_5.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-5">
                    <h1 class="mb-2 bread">Blog Single</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="fa fa-chevron-right"></i></a></span> <span>Blog Single <i class="fa fa-chevron-right"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{$blog->title}}</h2>
                    <p>
                        {{$blog->description}}
                    </p>


                </div> <!-- .col-md-8 -->

                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3>Category</h3>
                        <ul class="categories">
                            <li><a href="#">Breakfast <span>(6)</span></a></li>
                            <li><a href="#">Lunch <span>(8)</span></a></li>
                            <li><a href="#">Dinner <span>(2)</span></a></li>
                            <li><a href="#">Desserts <span>(2)</span></a></li>
                            <li><a href="#">Drinks <span>(2)</span></a></li>
                            <li><a href="#">Wine <span>(2)</span></a></li>
                        </ul>
                    </div>

                </div><!-- END COL -->
            </div>
        </div>
    </section>

@endsection

@section('scripts')


    <script type="text/javascript">

        $(document).ready(function(){
            $(".quantity").on("input", function(){
                var data_id = $(this).attr("data-id");
                var quantity = $(this).val();

                var ele = $(this);

                var parent_row = ele.parents("tr");

                var product_subtotal = parent_row.find("span.product-subtotal");

                var cart_total = $(".cart-total");

                var loading = parent_row.find(".btn-loading");

                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: "patch",
                    data: {_token: '{{ csrf_token() }}', id: data_id, quantity: quantity},
                    dataType: "json",
                    success: function (response) {


                        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                        $("#header-bar").html(response.data);

                        product_subtotal.text(response.subTotal);

                        cart_total.text(response.total);
                    }
                });

            });
        });

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });

    </script>

@endsection
