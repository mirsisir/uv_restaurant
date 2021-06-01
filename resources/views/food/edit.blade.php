@extends('layouts.admin_base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($food->name) ? $food->name : 'Food' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('food.food.index') }}" class="btn btn-primary mr-2" title="Show All Food">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Food
                </a>

                <a href="{{ route('food.food.create') }}" class="btn btn-success" title="Create New Food">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Food
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

            <form method="POST" action="{{ route('food.food.update', $food->id) }}" id="edit_food_form" name="edit_food_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('food.form', [
                                        'food' => $food,
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
