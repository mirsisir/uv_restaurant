@extends('layouts.admin_base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($food->name) ? $food->name : 'Food' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('food.food.destroy', $food->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('food.food.index') }}" class="btn btn-primary mr-2" title="Show All Food">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Food
                    </a>

                    <a href="{{ route('food.food.create') }}" class="btn btn-success mr-2" title="Create New Food">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Food
                    </a>

                    <a href="{{ route('food.food.edit', $food->id ) }}" class="btn btn-primary mr-2" title="Edit Food">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Food
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Food" onclick="return confirm(&quot;Click Ok to delete Food.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Food
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $food->name }}</dd>
            <dt>Category</dt>
            <dd>{{ optional($food->category)->name }}</dd>
            <dt>Details</dt>
            <dd>{{ $food->details }}</dd>
            <dt>Price</dt>
            <dd>{{ $food->price }}</dd>
            <dt>Is Offer</dt>
            <dd>{{ ($food->is_offer) ? 'Yes' : 'No' }}</dd>
            <dt>Is Special</dt>
            <dd>{{ ($food->is_special) ? 'Yes' : 'No' }}</dd>
            <dt>Status</dt>
            <dd>{{ $food->status }}</dd>
            <dt>Image</dt>
            <dd>{{ asset('storage/' . $food->image) }}</dd>

        </dl>

    </div>
</div>

@endsection
