@extends('layouts.admin_base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($title) ? $title : 'Order' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('orders.order.index') }}" class="btn btn-primary mr-2" title="Show All Order">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Order
                </a>

                <a href="{{ route('orders.order.create') }}" class="btn btn-success" title="Create New Order">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Order
                </a>

            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('orders.order.update', $order->id) }}" id="edit_order_form" name="edit_order_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('orders.form', [
                                        'order' => $order,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
