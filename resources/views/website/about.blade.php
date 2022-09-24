@extends('layouts.base')
@section('title', 'Cart')

@section('content')

    <div>
        <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end justify-content-center">
                    <div class="col-md-9 ftco-animate text-center mb-5">
                        <h1 class="mb-2 bread">{{__('web.About')}}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a>{{__('web.Home')}}
                                    <i class="fa fa-chevron-right"></i></a></span> <span>{{__('web.About')}} <i class="fa fa-chevron-right"></i></span></p>
                    </div>
                </div>
            </div>
        </section>


        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="flex justify-content-center align-items-center text-center">
                    <div class=" ftco-animate makereservation p-4 p-md-5">
                        <div class="heading-section ftco-animate mb-5">
                            <span class="">This is our secrets</span>
                            <h2 class="mb-4">{{__('web.Perfect_Ingredients')}}</h2>
                            <p>{{__('web.OPEN_t')}}</p>

                            <p><a href="#" class="btn btn-primary">{{__('web.Learn_more')}}</a></p>
                        </div>
                    </div>
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
