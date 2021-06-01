@extends('layouts.admin_base')
@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($test->name) ? $test->name : 'Test' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('tests.test.index') }}" class="btn btn-primary mr-2" title="Show All Test">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Test
                </a>

                <a href="{{ route('tests.test.create') }}" class="btn btn-success" title="Create New Test">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Test
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

            <form method="POST" action="{{ route('tests.test.update', $test->id) }}" id="edit_test_form" name="edit_test_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('tests.form', [
                                        'test' => $test,
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
