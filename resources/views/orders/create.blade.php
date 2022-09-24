@extends('layouts.admin_base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Order</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('orders.order.index') }}" class="btn btn-primary" title="Show All Order">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Order
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('orders.order.store') }}" accept-charset="UTF-8" id="create_order_form" name="create_order_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('orders.form', [
                                        'order' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


