@extends('layouts.admin_base')
@section('content')
{{--    <div class="row" id="proBanner">--}}
{{--        <div class="col-12">--}}
{{--                <span class="d-flex align-items-center purchase-popup">--}}
{{--                  <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>--}}
{{--                  <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>--}}
{{--                  <i class="mdi mdi-close" id="bannerClose"></i>--}}
{{--                </span>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row">

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1">{{$order}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h3 class="">Active : {{$users}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h5 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h5>
                    <h6 class="">Total User : {{$total}}</h6>
                    <h6 class="">Login User : {{$users}}</h6>
                    <h6 class="">Guests User : {{$Guests}}</h6>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')
    <script>

        $(document).ready(function() {
            $('#example').DataTable();
            $('.js-example-basic-single').select2();
        } );
    </script>
@endsection
