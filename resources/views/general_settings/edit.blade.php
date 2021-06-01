@extends('layouts.admin_base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($generalSettings->name) ? $generalSettings->name : 'General Settings' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

{{--                <a href="{{ route('general_settings.general_settings.index') }}" class="btn btn-primary mr-2" title="Show All General Settings">--}}
{{--                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>--}}
{{--                    Show All General Settings--}}
{{--                </a>--}}

{{--                <a href="{{ route('general_settings.general_settings.create') }}" class="btn btn-success" title="Create New General Settings">--}}
{{--                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>--}}
{{--                    Create New General Settings--}}
{{--                </a>--}}

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

            <form method="POST" action="{{ route('general_settings.general_settings.update', $generalSettings->id) }}" id="edit_general_settings_form" name="edit_general_settings_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('general_settings.form', [
                                        'generalSettings' => $generalSettings,
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
