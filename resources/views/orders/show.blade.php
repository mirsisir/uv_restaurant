@extends('layouts.admin_base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($title) ? $title : 'Order' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('orders.order.destroy', $order->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('orders.order.index') }}" class="btn btn-primary mr-2" title="Show All Order">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Order
                    </a>

                    <a href="{{ route('orders.order.create') }}" class="btn btn-success mr-2" title="Create New Order">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Order
                    </a>

                    <a href="{{ route('orders.order.edit', $order->id ) }}" class="btn btn-primary mr-2" title="Edit Order">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Order
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Order" onclick="return confirm(&quot;Click Ok to delete Order.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Order
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>First Name</dt>
            <dd>{{ $order->first_name }}</dd>
            <dt>Last Name</dt>
            <dd>{{ $order->last_name }}</dd>
            <dt>Address</dt>
            <dd>{{ $order->address }}</dd>
            <dt>Phone</dt>
            <dd>{{ $order->phone }}</dd>
            <dt>Email</dt>
            <dd>{{ $order->email }}</dd>
            <dt>Total</dt>
            <dd>{{ $order->total }}</dd>
            <dt>Payment Type</dt>
            <dd>{{ $order->payment_type }}</dd>
            <dt>Is Paid</dt>
            <dd>{{ ($order->is_paid) ? 'Yes' : 'No' }}</dd>
            <dt>Status</dt>
            <dd>{{ $order->status }}</dd>

        </dl>

    </div>
</div>

@endsection
