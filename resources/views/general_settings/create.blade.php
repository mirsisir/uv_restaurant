@extends('layouts.admin_base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New General Settings</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('general_settings.general_settings.index') }}" class="btn btn-primary" title="Show All General Settings">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All General Settings
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('general_settings.general_settings.store') }}" accept-charset="UTF-8" id="create_general_settings_form" name="create_general_settings_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('general_settings.form', [
                                        'generalSettings' => null,
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


