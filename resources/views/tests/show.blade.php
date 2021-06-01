@extends('layouts.admin_base')
@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($test->name) ? $test->name : 'Test' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('tests.test.destroy', $test->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('tests.test.index') }}" class="btn btn-primary mr-2" title="Show All Test">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Test
                    </a>

                    <a href="{{ route('tests.test.create') }}" class="btn btn-success mr-2" title="Create New Test">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Test
                    </a>

                    <a href="{{ route('tests.test.edit', $test->id ) }}" class="btn btn-primary mr-2" title="Edit Test">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Test
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Test" onclick="return confirm(&quot;Click Ok to delete Test.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Test
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $test->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $test->description }}</dd>
            <dt>Phone</dt>
            <dd>{{ $test->phone }}</dd>
            <dt>Is Offer</dt>
            <dd>{{ ($test->is_offer) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection
