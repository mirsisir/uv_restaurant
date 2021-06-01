@extends('layouts.admin_base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Food</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('food.food.index') }}" class="btn btn-primary" title="Show All Food">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Food
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('food.food.store') }}" accept-charset="UTF-8" id="create_food_form" name="create_food_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('food.form', [
                                        'food' => null,
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


