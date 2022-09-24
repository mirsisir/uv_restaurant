@extends('layouts.base')
@section('title', 'Cart')

@section('content')

    <div>
        <section class="hero-wrap hero-wrap-2" style="background-image: url('.././images/bg_5.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end justify-content-center">
                    <div class="col-md-9 ftco-animate text-center mb-5">
                        <h1 class="mb-2 bread">Blog</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Blog <i class="fa fa-chevron-right"></i></span></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">

                    @foreach($blogList as $blog)
                        <div class="col-md-4 ftco-animate">
                            <div class="blog-entry">
                                <a href="blog-single.html" class="block-20" style="background-image: url('.././images/image_1.jpg');">
                                </a>
                                <div class="text px-4 pt-3 pb-4">
                                    <div class="meta">
                                        <div><a href="#">August 3, 2020</a></div>
                                        <div><a href="#">Admin</a></div>
                                    </div>
                                    <h3 class="heading"><a href="#">{{$blog->title}}</a></h3>
                                    <p class="clearfix">
                                        <a href="{{route('read_blog',$blog->id)}}" class="float-left read btn btn-primary">Read more</a>
                                        <a href="#" class="float-right meta-chat"><span class="fa fa-comment"></span> 3</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>
    </div>

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
