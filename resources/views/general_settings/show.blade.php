@extends('layouts.admin_base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($generalSettings->name) ? $generalSettings->name : 'General Settings' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('general_settings.general_settings.destroy', $generalSettings->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
{{--                    <a href="{{ route('general_settings.general_settings.index') }}" class="btn btn-primary mr-2" title="Show All General Settings">--}}
{{--                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>--}}
{{--                        Show All General Settings--}}
{{--                    </a>--}}

{{--                    <a href="{{ route('general_settings.general_settings.create') }}" class="btn btn-success mr-2" title="Create New General Settings">--}}
{{--                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>--}}
{{--                        Create New General Settings--}}
{{--                    </a>--}}

                    <a href="{{ route('general_settings.general_settings.edit', $generalSettings->id ) }}" class="btn btn-primary mr-2" title="Edit General Settings">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit General Settings
                    </a>

{{--                    <button type="submit" class="btn btn-danger" title="Delete General Settings" onclick="return confirm(&quot;Click Ok to delete General Settings.?&quot;)">--}}
{{--                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>--}}
{{--                        Delete General Settings--}}
{{--                    </button>--}}
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $generalSettings->name }}</dd>
            <dt>Title</dt>
            <dd>{{ $generalSettings->title }}</dd>
            <dt>Phone</dt>
            <dd>{{ $generalSettings->phone }}</dd>
            <dt>Email</dt>
            <dd>{{ $generalSettings->email }}</dd>
            <dt>Address</dt>
            <dd>{{ $generalSettings->address }}</dd>
            <dt>Logo</dt>
            <dd><img src="{{ asset('storage/' . $generalSettings->logo) }}" width="350px" alt=""></dd>

        </dl>

    </div>
</div>

@endsection
